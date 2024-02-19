<?php

namespace App\Console\Commands;

use App\Mail\JobFakeNewsDetectionEmail;
use App\Models\JobFakeNewsDetection;
use App\Services\JobFakeNewsDetectionService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    private JobFakeNewsDetectionService $jobFakeNewsDetectionService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando que realiza o envio do email contendo as noticias que são fake news';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $jobFakeNewsDetectionService = new JobFakeNewsDetectionService();
        $resposta = [];
        $jobFakeNewsDetections = JobFakeNewsDetection::all();
        foreach ($jobFakeNewsDetections as $jobFakeNewsDetection) {
            info($jobFakeNewsDetection->links);
            $urls = $jobFakeNewsDetectionService->retrieveFakeNewsNotice($jobFakeNewsDetection->links);
            $resposta[] = [];
            foreach ($urls['links'] as $url) {
                $pageText = Http::post("https://mining-api.vercel.app/fakeNewsDetection/crawling", ['link' => $url[0]])->json();
                if ($pageText) {
                    $text = $pageText[0];
                    $response = Http::post("https://chatbot-integration-nine.vercel.app/fakeNewsDetection/validate", ['text' => $text[2]])
                        ->json();
                    $resposta[] = ["link" => $url[0], "text" => $response];
                }
            }
                    info($resposta);
                    Mail::to($jobFakeNewsDetection->emails)->send(new JobFakeNewsDetectionEmail(collect($resposta)));
        }

        info('Email sent successfully.');
    }
}
