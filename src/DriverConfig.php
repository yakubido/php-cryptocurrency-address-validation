<?php

declare(strict_types=1);

namespace Merkeleon\PhpCryptocurrencyAddressValidation;

use Merkeleon\PhpCryptocurrencyAddressValidation\Drivers\AbstractDriver;
use function class_exists;

/**
 * @template T
 */
readonly class DriverConfig
{
    /**
     * @param class-string<T> $driver
     * @param array $mainnet
     * @param array $testnet
     * @param array $regtest
     */
    public function __construct(
        private string $driver,
        private array $mainnet = [],
        private array $testnet = [],
        private array $regtest = [],
    )
    {
    }

    public function makeDriver(bool $isMainNet): ?AbstractDriver
    {
        if (!class_exists($this->driver)) {
            return null;
        }

        return new $this->driver($this->getDriverOptions($isMainNet));

    }

    private function getDriverOptions(bool $isMainNet): array
    {
        if ($isMainNet) {
            return $this->mainnet;
        }

        return $this->regtest ?: $this->testnet ?: $this->mainnet ?: [];
    }

    public static function __set_state(array $state): DriverConfig
    {
        return new self(
            driver: $state['driver'],
            mainnet: $state['mainnet'],
            testnet: $state['testnet'],
            regtest: $state['regtest'],
        );
    }
}
