<?php

namespace Tests\Unit\Services;

use App\Services\StatisticService;
use App\Contracts\StatisticRepositoryInterface;
use App\Contracts\PatientRepositoryInterface;
use Illuminate\Support\Collection;
use Mockery;
use Tests\TestCase;

class StatisticServiceTest extends TestCase
{
    public function test_it_returns_total_patients()
    {
        $mock_patient_repo = Mockery::mock(PatientRepositoryInterface::class);
        $mock_statistic_repo = Mockery::mock(StatisticRepositoryInterface::class);

        $mock_patient_repo->shouldReceive('countAll')
            ->once()
            ->andReturn(42)
        ;

        $service = new StatisticService($mock_statistic_repo, $mock_patient_repo);
        $this->assertSame(42, $service->totalPatients());
    }

    public function test_it_returns_latest_visits_as_collection()
    {
        $mock_statistic_repo = Mockery::mock(StatisticRepositoryInterface::class);
        $mock_patient_repo = Mockery::mock(PatientRepositoryInterface::class);
        $collection = new Collection([['visit' => 'v1'], ['visit' => 'v2']]);

        $mock_statistic_repo->shouldReceive('latestForDoctor')
            ->once()
            ->with(1, 5)
            ->andReturn($collection)
        ;

        $service = new StatisticService($mock_statistic_repo, $mock_patient_repo);
        $this->assertSame($collection, $service->latestVisits(1, 5));
    }

    public function test_it_returns_top_reasons_as_array()
    {
        $mock_statistic_repo = Mockery::mock(StatisticRepositoryInterface::class);
        $mock_patient_repo = Mockery::mock(PatientRepositoryInterface::class);

        $mock_statistic_repo->shouldReceive('topReasonsForDoctor')
            ->once()
            ->with(1, 3)
            ->andReturn(['Megfázás', 'Kontroll'])
        ;

        $service = new StatisticService($mock_statistic_repo, $mock_patient_repo);
        $this->assertSame(['Megfázás', 'Kontroll'], $service->topReasons(1, 3));
    }
}
