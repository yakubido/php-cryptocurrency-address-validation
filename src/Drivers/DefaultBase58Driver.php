<?php

declare(strict_types=1);

namespace Merkeleon\PhpCryptocurrencyAddressValidation\Drivers;

use function hexdec;

class DefaultBase58Driver extends Base58Driver
{
    protected static string $base58Alphabet = '123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';

    public function check(string $address): bool
    {
        $isValid = false;

        $calculatedAddressVersion = $this->getVersion($address);
        if (null === $calculatedAddressVersion) {
            return false;
        }

        foreach ($this->options as $hexVersion) {
            var_dump([$hexVersion, $calculatedAddressVersion]);
            if (hexdec($hexVersion) === hexdec($calculatedAddressVersion)) {
                $isValid = true;
                break;
            }
        }

        return $isValid;
    }
}
