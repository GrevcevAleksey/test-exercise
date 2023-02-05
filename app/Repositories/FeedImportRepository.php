<?php

namespace App\Repositories;

use App\Models\DataFeedImport;
use Illuminate\Database\Eloquent\Collection;

class FeedImportRepository
{
    /**
     * Найти запись в базе по external_id
     *
     * @param int $externalId
     * @return Collection
     */
    public function findByExternalId(int $externalId): Collection
    {
        return DataFeedImport::where('external_id', $externalId)
            ->get();
    }

    /**
     * Добавление и обновление данных из фида
     *
     * @param array $dataForImport
     */
    public function updateOrCreateData(array $dataForImport): void
    {
        $itemForFeedImport = $this->findByExternalId($dataForImport['external_id']);

        if ($itemForFeedImport->count()) {
            DataFeedImport::where('external_id', $dataForImport['external_id'])
                ->update($dataForImport);
        } else {
            DataFeedImport::create($dataForImport);
        }
    }

    /**
     * Удаление данных отсутствующих в фиде
     *
     * @param array $ids
     */
    public function deleteOldData(array $ids): void
    {
        DataFeedImport::whereNotIn('external_id', $ids)
            ->delete();
    }
}
