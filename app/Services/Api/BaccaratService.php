<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 2018/8/7
 * Time: 下午5:00
 */

namespace App\Services\Api;

use App\Http\Resources\BaccaratHistoryResource as BaccaratHistoryResource;
use App\Http\Resources\BaccaratHistoryCollection as BaccaratHistoryCollection;
use App\Repositories\BaccaratRepository;

/**
 * @property BaccaratRepository baccaratRepository
 */
class BaccaratService
{
    /**
     * BaccaratService constructor.
     * @param BaccaratRepository $baccaratRepository
     */
    public function __construct(
        BaccaratRepository $baccaratRepository
    ) {
        $this->baccaratRepository = $baccaratRepository;
    }

    /**
     * @param $input
     * @return BaccaratHistoryCollection|string
     */
    public function getBaccaratHistoryReport($input)
    {
        $searchStartTime = $input['startAt'];
        $searchEndTime = $input['endAt'];
        $status = $input['modifiedStatus'];

        return new BaccaratHistoryCollection(BaccaratHistoryResource::collection($this->baccaratRepository->getBaccaratHistoryReport($searchStartTime,
            $searchEndTime, $status)));
    }
}
