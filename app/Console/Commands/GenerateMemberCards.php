<?php

namespace App\Console\Commands;

use App\Member;
use App\UniqueCode;
use Illuminate\Console\Command;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GenerateMemberCards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'members:generate-cards';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate all the member cards';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->log('Starting card generation');

        $members = Member::where('generate_card', true)->get();

        foreach ($members as $member) {

            $baseImage = Image::make(public_path('/images/base_cartao_socio.png'));

            $baseImage->text(Str::upper($member->name), 60, 510, function ($font) {
                $font->file(public_path('/fonts/Roboto-Bold.ttf'));
                $font->size(33);
                $font->color('#ffffff');
                $font->align('left');
                $font->valign('center');
            });

            $baseImage->text('SÓCIO Nº ' . $member->number, 60, 550, function ($font) {
                $font->file(public_path('/fonts/Roboto-Medium.ttf'));
                $font->size(33);
                $font->color('#ffffff');
                $font->align('left');
                $font->valign('center');
            });

            do {
                $token = Str::random(9);
                $this->log("Generated code '$token', checking uniqueness");
            } while (UniqueCode::where('code', $token)->count() != 0);

            $url = urlencode(route('card.verify', [$token]));
            $qr = Image::make(
                "http://api.qrserver.com/v1/create-qr-code/" .
                "?data=$url&size=240x240&color=0-0-0&bgcolor=255-255-255&margin=0"
            )->encode('png');
            $transparentQr = Image::canvas(240,240, [0, 0, 0, 0]);

            for ($i = 0; $i < $qr->getWidth(); $i++) {
                for ($j = 0; $j < $qr->getHeight(); $j++) {
                    $pickedColor = $qr->pickColor($i, $j);
                    if ($pickedColor[0] < 10) {
                        $transparentQr->pixel([255, 255, 255], $i, $j);
                    }
                }
            }

            $baseImage->insert($transparentQr, 'bottom-right',60, 60);

            $filename = "/storage/members/cards/$token.png";
            $baseImage->save(public_path($filename));

            if (!is_null($member->card)) {
                try {
                    unlink(public_path($member->card));
                } catch (\Exception $e) {
                    $this->log('Error trying to delete existing card image', 'error');
                }
            }

            UniqueCode::create(['code' => $token]);
            $member->card = $filename;
            $member->card_token = $token;
            $member->generate_card = false;
            $member->save();

            $this->log("Finished card for member number $member->number");
        }

        $this->log('Finished card generation');

        return 0;
    }

    private function log(string $message, string $type = 'info')
    {
        parent::$type($message);
        Log::$type($message);
    }
}
