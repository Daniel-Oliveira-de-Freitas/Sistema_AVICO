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
        $jobFakeNewsDetections = JobFakeNewsDetection::all();
        foreach ($jobFakeNewsDetections as $jobFakeNewsDetection) {
            info($jobFakeNewsDetection->links);
            $resposta = $jobFakeNewsDetectionService->retrieveFakeNewsNotice($jobFakeNewsDetection->links);
            info($resposta);
            Mail::to($jobFakeNewsDetection->emails)->send(new JobFakeNewsDetectionEmail(collect($resposta)));
        }

        info('Email sent successfully.');
    }
}
