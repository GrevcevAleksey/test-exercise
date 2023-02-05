<?php

namespace App\Services;

use App\Repositories\FeedImportRepository;

class FeedImportService
{
    public function __construct(
        protected FeedImportRepository $feedImportRepository
    ) {
    }

    /**
     * Парсинг фида
     *
     * @param string $url
     */
    public function import(string $url): void
    {
        $content = json_decode(file_get_contents($url));
        $ids = [];
        foreach ($content->data as $element) {
            $ids[] = $element->id;
            $dataForImport['external_id'] = $element->id;
            $dataForImport['domain_id'] = $element->domain_id;
            $dataForImport['subject'] = $element->subject;
            $dataForImport['unisender_send_date_at'] = $element->unisender_send_date_at;

            $this->feedImportRepository->updateOrCreateData($dataForImport);
        }
        $this->feedImportRepository->deleteOldData($ids);
    }
}
