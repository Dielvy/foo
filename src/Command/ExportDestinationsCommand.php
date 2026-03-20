<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[AsCommand(
    name: 'app:export-destinations',
    description: 'Export destinations to CSV file from API',
)]
class ExportDestinationsCommand extends Command
{
    public function __construct(
        private HttpClientInterface $client,
        private string $apiBaseUrl,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addOption('file', null, InputOption::VALUE_OPTIONAL, 'Output file path', 'var/destinations.csv');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $filePath = $input->getOption('file');

        $response = $this->client->request('GET', $this->apiBaseUrl . '/api/destinations', [
            'verify_peer' => false,
            'verify_host' => false,
        ]);

        if ($response->getStatusCode() !== 200) {
            $io->error('Failed to fetch data from API');
            return Command::FAILURE;
        }

        $data = $response->toArray();

        $destinations = $data;

        if (empty($destinations)) {
            $io->warning('No destinations found to export.');
            return Command::SUCCESS;
        }

        $handle = fopen($filePath, 'w');
        if (!$handle) {
            $io->error('Unable to open file for writing: ' . $filePath);
            return Command::FAILURE;
        }

        fputcsv($handle, ['Name', 'Description', 'Price', 'Duration']);

        foreach ($destinations as $destination) {
            fputcsv($handle, [
                $destination['name'],
                $destination['description'],
                $destination['price'],
                $destination['duration'] . ' days',
            ]);
        }

        fclose($handle);

        $io->success('Destinations exported to ' . $filePath . ' (' . count($destinations) . ' records)');

        return Command::SUCCESS;
    }
}
