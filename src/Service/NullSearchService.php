<?php

namespace Algolia\SearchBundle\Service;

use Algolia\AlgoliaSearch\RequestOptions\RequestOptions;
use Algolia\AlgoliaSearch\Response\BatchIndexingResponse;
use Algolia\AlgoliaSearch\Response\NullResponse;
use Doctrine\Common\Persistence\ObjectManager;

final class NullSearchService implements SearchServiceInterface
{
    /**
     * @param string $className
     *
     * @return bool
     */
    public function isSearchable($className)
    {
        return true;
    }

    /**
     * @return array<int, string>
     */
    public function getSearchables()
    {
        return ['foo', 'bar'];
    }

    /**
     * @return array<string, array|int|string>
     */
    public function getConfiguration()
    {
        return ['batchSize' => 200];
    }

    /**
     * @param string $className
     *
     * @return string
     */
    public function searchableAs($className)
    {
        return $className;
    }

    /**
     * @param object|array<int, object>                      $searchables
     * @param array<string, int|string|array>|RequestOptions $requestOptions
     *
     * @return \Algolia\AlgoliaSearch\Response\AbstractResponse
     */
    public function index(ObjectManager $objectManager, $searchables, $requestOptions = [])
    {
        return new BatchIndexingResponse(['success' => true], 'foo');
    }

    /**
     * @param object|array<int, object>                      $searchables
     * @param array<string, int|string|array>|RequestOptions $requestOptions
     *
     * @return \Algolia\AlgoliaSearch\Response\AbstractResponse
     */
    public function remove(ObjectManager $objectManager, $searchables, $requestOptions = [])
    {
        return new BatchIndexingResponse(['success' => true], 'foo');
    }

    /**
     * @param string                                         $className
     * @param array<string, int|string|array>|RequestOptions $requestOptions
     *
     * @return \Algolia\AlgoliaSearch\Response\AbstractResponse
     */
    public function clear($className, $requestOptions = [])
    {
        return new NullResponse();
    }

    /**
     * @param string                                         $className
     * @param array<string, int|string|array>|RequestOptions $requestOptions
     *
     * @return \Algolia\AlgoliaSearch\Response\AbstractResponse
     */
    public function delete($className, $requestOptions = [])
    {
        return new NullResponse();
    }

    /**
     * @param string                                         $className
     * @param string                                         $query
     * @param array<string, int|string|array>|RequestOptions $requestOptions
     *
     * @return array<int, object>
     *
     * @throws \Algolia\AlgoliaSearch\Exceptions\AlgoliaException
     */
    public function search(ObjectManager $objectManager, $className, $query = '', $requestOptions = [])
    {
        return [new \stdClass()];
    }

    /**
     * @param string                                         $className
     * @param string                                         $query
     * @param array<string, int|string|array>|RequestOptions $requestOptions
     *
     * @return array<string, int|string|array>
     *
     * @throws \Algolia\AlgoliaSearch\Exceptions\AlgoliaException
     */
    public function rawSearch($className, $query = '', $requestOptions = [])
    {
        return [
            'foo' => 'success',
        ];
    }

    /**
     * @param string                                         $className
     * @param string                                         $query
     * @param array<string, int|string|array>|RequestOptions $requestOptions
     *
     * @return int
     *
     * @throws \Algolia\AlgoliaSearch\Exceptions\AlgoliaException
     */
    public function count($className, $query = '', $requestOptions = [])
    {
        return 0;
    }

    /**
     * @param object $entity
     *
     * @return bool
     */
    public function shouldBeIndexed($entity)
    {
        return true;
    }
}
