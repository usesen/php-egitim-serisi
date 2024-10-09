<?php

namespace App\Application\Services;

use App\Domain\Entities\PHPDersleriCustomer;

class PHPDersleriCustomerService
{
    /**
     * Müşteri ekleme işlemini gerçekleştirir.
     *
     * @param array $data
     * @return PHPDersleriCustomer
     */
    public function createCustomer(array $data): PHPDersleriCustomer
    {
        // Müşteri oluşturuluyor ve veritabanına kaydediliyor
        $customer = PHPDersleriCustomer::create($data);

        // Bakiye hesaplama işlemi yapılıyor
        $customer->updateBalances();

        // Güncellenmiş müşteri kaydını geri döndürüyoruz
        return $customer;
    }

    /**
     * Müşteri güncelleme işlemini gerçekleştirir.
     *
     * @param int $id
     * @param array $data
     * @return PHPDersleriCustomer|null
     */
    public function updateCustomer(int $id, array $data): ?PHPDersleriCustomer
    {
        // Müşteri veritabanında bulunup bulunmadığını kontrol ediyoruz
        $customer = PHPDersleriCustomer::find($id);

        if ($customer) {
            // Müşteri verilerini güncelliyoruz
            $customer->update($data);

            // Güncelleme sonrası bakiye hesaplaması
            $customer->updateBalances();

            // Güncellenmiş veriyi geri döndürüyoruz
            return $customer;
        }

        return null;
    }

    /**
     * Müşteri silme işlemini gerçekleştirir.
     *
     * @param int $id
     * @return bool
     */
    public function deleteCustomer(int $id): bool
    {
        $customer = PHPDersleriCustomer::find($id);

        if ($customer) {
            return $customer->delete();
        }

        return false;
    }

    /**
     * Tüm müşterileri listeler.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllCustomers(): \Illuminate\Database\Eloquent\Collection
    {
        return PHPDersleriCustomer::all();
    }
}
