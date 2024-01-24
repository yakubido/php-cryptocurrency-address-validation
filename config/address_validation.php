<?php

declare(strict_types=1);

use Merkeleon\PhpCryptocurrencyAddressValidation\DriverConfig;
use Merkeleon\PhpCryptocurrencyAddressValidation\Drivers;
use Merkeleon\PhpCryptocurrencyAddressValidation\Enums\CurrencyEnum;

return [
    CurrencyEnum::BEACON->value => [
        new DriverConfig(
            Drivers\Bech32Driver::class,
            ['bnb' => null],
            ['tbnb' => null]
        ),
    ],
    CurrencyEnum::BITCOIN_CASH->value => [
        new DriverConfig(
            Drivers\Base32Driver::class,
            ['bitcoincash:' => null],
            ['bchtest:' => null, 'bchreg:' => null,]
        ),
        new DriverConfig(
            Drivers\DefaultBase58Driver::class,
            ['00', '05'],
            ['C4', '6F']
        ),
    ],
    CurrencyEnum::BITCOIN->value => [
        new DriverConfig(
            Drivers\DefaultBase58Driver::class,
            ['00', '05'],
            ['C4', '6F']
        ),
        new DriverConfig(
            Drivers\Bech32Driver::class,
            ['bc' => null],
            ['tb' => null, 'bcrt' => null]
        ),
    ],
    CurrencyEnum::CARDANO->value => [
        new DriverConfig(
            Drivers\CardanoDriver::class,
            ['addr' => null],
            ['addr_test' => null],
        ),
        new DriverConfig(
            Drivers\CborDriver::class,
            ['A' => 33, 'D' => 66],
            ['2' => 40, '3' => 73],
        )
    ],
    CurrencyEnum::DASHCOIN->value => [
        new DriverConfig(
            Drivers\DefaultBase58Driver::class,
            ['4C', '10'],
            ['8C', '13']
        ),
    ],
    CurrencyEnum::DOGECOIN->value => [
        new DriverConfig(
            Drivers\DefaultBase58Driver::class,
            ['1E', '16'],
            ['71', 'C4'],
            ['6F', 'C4'],
        ),
    ],
    CurrencyEnum::EOS->value => [
        new DriverConfig(Drivers\EosDriver::class),
    ],
    CurrencyEnum::ETHEREUM->value => [
        new DriverConfig(Drivers\KeccakStrictDriver::class),
    ],
    CurrencyEnum::LITECOIN->value => [
        new DriverConfig(
            Drivers\DefaultBase58Driver::class,
            ['30', '32', '05'],
            ['6F', '6F', 'C4', '3A']
        ),
        new DriverConfig(
            Drivers\Bech32Driver::class,
            ['ltc' => null],
            ['tltc' => null, 'rltc' => null]
        )
    ],
    CurrencyEnum::RIPPLE->value => [
        new DriverConfig(
            Drivers\XrpBase58Driver::class,
            ['r' => '00']
        ),
        new DriverConfig(
            Drivers\XrpXAddressDriver::class,
            ['X' => null],
            ['T' => null],
        ),
    ],
    CurrencyEnum::TRON->value => [
        new DriverConfig(
            Drivers\DefaultBase58Driver::class,
            ['41'],
        ),
    ],
    CurrencyEnum::ZCASH->value => [
        new DriverConfig(
            Drivers\DefaultBase58Driver::class,
            ['1C'],
        ),
    ],
];