<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pembelian;

class PembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pembelian = [
            [
                'id' => '1',
                'id_supplier' => '8',
                'no_nota' => '-',
                'sub_total' => '2850000',
                'bayar' => '0',
                'hutang' => '-2850000',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-01-03 22:17:16',
                'updated_at' => '2023-01-03 22:17:16',
            ],[
                'id' => '2',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '4466000',
                'bayar' => '0',
                'hutang' => '-4466000',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-01-03 22:17:16',
                'updated_at' => '2023-01-03 22:17:16',
            ],[
                'id' => '3',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '42500',
                'bayar' => '42500',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-01-03 22:17:16',
                'updated_at' => '2023-01-03 22:17:16',
            ],[
                'id' => '4',
                'id_supplier' => '6',
                'no_nota' => 'N009361',
                'sub_total' => '88000',
                'bayar' => '0',
                'hutang' => '-88000',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-01-04 22:17:16',
                'updated_at' => '2023-01-04 22:17:16',
            ],[
                'id' => '5',
                'id_supplier' => '12',
                'no_nota' => 'TRN0701200003',
                'sub_total' => '5367000',
                'bayar' => '5367000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-01-07 22:17:16',
                'updated_at' => '2023-01-07 22:17:16',
            ],[
                'id' => '6',
                'id_supplier' => '6',
                'no_nota' => 'N009395',
                'sub_total' => '264000',
                'bayar' => '0',
                'hutang' => '-264000',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-01-08 22:17:16',
                'updated_at' => '2023-01-08 22:17:16',
            ],[
                'id' => '7',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '33750',
                'bayar' => '33750',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-01-08 22:17:16',
                'updated_at' => '2023-01-08 22:17:16',
            ],[
                'id' => '8',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '1620000',
                'bayar' => '1620000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-01-08 22:17:16',
                'updated_at' => '2023-01-08 22:17:16',
            ],[
                'id' => '9',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '1032500',
                'bayar' => '1032500',
                'hutang' => '-',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-01-16 22:17:16',
                'updated_at' => '2023-01-16 22:17:16',
            ],[
                'id' => '10',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '47000',
                'bayar' => '47000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-01-17 22:17:16',
                'updated_at' => '2023-01-17 22:17:16',
            ],[
                'id' => '11',
                'id_supplier' => '6',
                'no_nota' => 'N009564',
                'sub_total' => '35000',
                'bayar' => '0',
                'hutang' => '-35000',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-01-28 22:17:16',
                'updated_at' => '2023-01-28 22:17:16',
            ],[
                'id' => '12',
                'id_supplier' => '12',
                'no_nota' => '-',
                'sub_total' => '342225',
                'bayar' => '342225',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-01-28 22:17:16',
                'updated_at' => '2023-01-28 22:17:16',
            ],[
                'id' => '13',
                'id_supplier' => '6',
                'no_nota' => 'N009580',
                'sub_total' => '455000',
                'bayar' => '0',
                'hutang' => '-455000',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-01-29 22:17:16',
                'updated_at' => '2023-01-29 22:17:16',
            ],[
                'id' => '14',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '93600',
                'bayar' => '93600',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-01-29 22:17:16',
                'updated_at' => '2023-01-29 22:17:16',
            ],[
                'id' => '15',
                'id_supplier' => '6',
                'no_nota' => 'N009584',
                'sub_total' => '592000',
                'bayar' => '0',
                'hutang' => '-592000',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-01-30 22:17:16',
                'updated_at' => '2023-01-30 22:17:16',
            ],[
                'id' => '16',
                'id_supplier' => '16',
                'no_nota' => '-',
                'sub_total' => '44000',
                'bayar' => '44000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-02-01 22:17:16',
                'updated_at' => '2023-02-01 22:17:16',
            ],[
                'id' => '17',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '167500',
                'bayar' => '167500',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-02-04 22:17:16',
                'updated_at' => '2023-02-04 22:17:16',
            ],[
                'id' => '18',
                'id_supplier' => '16',
                'no_nota' => '-',
                'sub_total' => '33000',
                'bayar' => '33000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-02-06 22:17:16',
                'updated_at' => '2023-02-06 22:17:16',
            ],[
                'id' => '19',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '33000',
                'bayar' => '33000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-02-07 22:17:16',
                'updated_at' => '2023-02-07 22:17:16',
            ],[
                'id' => '20',
                'id_supplier' => '6',
                'no_nota' => 'N009655',
                'sub_total' => '88000',
                'bayar' => '0',
                'hutang' => '-88000',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-02-08 22:17:16',
                'updated_at' => '2023-02-08 22:17:16',
            ],[
                'id' => '21',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '65000',
                'bayar' => '65000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-02-11 22:17:16',
                'updated_at' => '2023-02-11 22:17:16',
            ],[
                'id' => '22',
                'id_supplier' => '16',
                'no_nota' => '-',
                'sub_total' => '22000',
                'bayar' => '22000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-02-11 22:17:16',
                'updated_at' => '2023-02-11 22:17:16',
            ],[
                'id' => '23',
                'id_supplier' => '18',
                'no_nota' => 'FJ200200164',
                'sub_total' => '130000',
                'bayar' => '0',
                'hutang' => '-130000',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-02-13 22:17:16',
                'updated_at' => '2023-02-13 22:17:16',
            ],[
                'id' => '24',
                'id_supplier' => '19',
                'no_nota' => 'SN20020384',
                'sub_total' => '341000',
                'bayar' => '0',
                'hutang' => '-341000',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-02-14 22:17:16',
                'updated_at' => '2023-02-14 22:17:16',
            ],[
                'id' => '25',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '311500',
                'bayar' => '311500',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-02-15 22:17:16',
                'updated_at' => '2023-02-15 22:17:16',
            ],[
                'id' => '26',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '182000',
                'bayar' => '182000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-02-15 22:17:16',
                'updated_at' => '2023-02-15 22:17:16',
            ],[
                'id' => '27',
                'id_supplier' => '1',
                'no_nota' => 'JLPST0036494',
                'sub_total' => '328625',
                'bayar' => '0',
                'hutang' => '-328625',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-02-17 22:17:16',
                'updated_at' => '2023-02-17 22:17:16',
            ],[
                'id' => '28',
                'id_supplier' => '20',
                'no_nota' => 'N155321',
                'sub_total' => '80000',
                'bayar' => '80000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-02-17 22:17:16',
                'updated_at' => '2023-02-17 22:17:16',
            ],[
                'id' => '29',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '489500',
                'bayar' => '489500',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-02-17 22:17:16',
                'updated_at' => '2023-02-17 22:17:16',
            ],[
                'id' => '30',
                'id_supplier' => '6',
                'no_nota' => 'N009730',
                'sub_total' => '1540000',
                'bayar' => '0',
                'hutang' => '-1540000',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-02-18 22:17:16',
                'updated_at' => '2023-02-18 22:17:16',
            ],[
                'id' => '31',
                'id_supplier' => '6',
                'no_nota' => 'N009788',
                'sub_total' => '176000',
                'bayar' => '0',
                'hutang' => '-176000',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-02-26 22:17:16',
                'updated_at' => '2023-02-26 22:17:16',
            ],[
                'id' => '32',
                'id_supplier' => '21',
                'no_nota' => '-',
                'sub_total' => '165000',
                'bayar' => '165000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-02-27 22:17:16',
                'updated_at' => '2023-02-27 22:17:16',
            ],[
                'id' => '33',
                'id_supplier' => '8',
                'no_nota' => '-',
                'sub_total' => '833000',
                'bayar' => '0',
                'hutang' => '-83000',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-02-28 22:17:16',
                'updated_at' => '2023-02-28 22:17:16',
            ],[
                'id' => '34',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '144500',
                'bayar' => '144500',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-02-29 22:17:16',
                'updated_at' => '2023-02-29 22:17:16',
            ],[
                'id' => '35',
                'id_supplier' => '6',
                'no_nota' => 'N009816',
                'sub_total' => '88000',
                'bayar' => '0',
                'hutang' => '-88000',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-03-02 22:17:16',
                'updated_at' => '2023-03-02 22:17:16',
            ],[
                'id' => '36',
                'id_supplier' => '16',
                'no_nota' => '-',
                'sub_total' => '8000',
                'bayar' => '8000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-03-09 22:17:16',
                'updated_at' => '2023-03-09 22:17:16',
            ],[
                'id' => '37',
                'id_supplier' => '6',
                'no_nota' => 'N009868',
                'sub_total' => '88000',
                'bayar' => '0',
                'hutang' => '-88000',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-03-10 22:17:16',
                'updated_at' => '2023-03-10 22:17:16',
            ],[
                'id' => '38',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '41000',
                'bayar' => '41000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-03-10 22:17:16',
                'updated_at' => '2023-03-10 22:17:16',
            ],[
                'id' => '39',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '150000',
                'bayar' => '150000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-03-17 22:17:16',
                'updated_at' => '2023-03-17 22:17:16',
            ],[
                'id' => '40',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '123000',
                'bayar' => '123000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-03-17 22:17:16',
                'updated_at' => '2023-03-17 22:17:16',
            ],[
                'id' => '41',
                'id_supplier' => '9',
                'no_nota' => '-',
                'sub_total' => '150000',
                'bayar' => '150000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-03-17 22:17:16',
                'updated_at' => '2023-03-17 22:17:16',
            ],[
                'id' => '42',
                'id_supplier' => '20',
                'no_nota' => 'N237695',
                'sub_total' => '80000',
                'bayar' => '80000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-03-18 22:18:16',
                'updated_at' => '2023-03-18 22:18:16',
            ],[
                'id' => '43',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '89000',
                'bayar' => '89000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-03-18 22:17:16',
                'updated_at' => '2023-03-18 22:17:16',
            ],[
                'id' => '44',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '47000',
                'bayar' => '47000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-03-18 22:18:16',
                'updated_at' => '2023-03-18 22:18:16',
            ],[
                'id' => '45',
                'id_supplier' => '10',
                'no_nota' => '304128020',
                'sub_total' => '1460000',
                'bayar' => '0',
                'hutang' => '-1460000',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-03-28 22:17:16',
                'updated_at' => '2023-03-28 22:17:16',
            ],[
                'id' => '46',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '36500',
                'bayar' => '36500',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-03-28 22:17:16',
                'updated_at' => '2023-03-28 22:17:16',
            ],[
                'id' => '47',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '58000',
                'bayar' => '58000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-03-28 22:17:16',
                'updated_at' => '2023-03-28 22:17:16',
            ],[
                'id' => '48',
                'id_supplier' => '8',
                'no_nota' => '-',
                'sub_total' => '490000',
                'bayar' => '0',
                'hutang' => '-490000',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-03-30 22:17:16',
                'updated_at' => '2023-03-30 22:17:16',
            ],[
                'id' => '49',
                'id_supplier' => '19',
                'no_nota' => 'SN20030715',
                'sub_total' => '391600',
                'bayar' => '0',
                'hutang' => '-391600',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-03-30 22:17:16',
                'updated_at' => '2023-03-30 22:17:16',
            ],[
                'id' => '50',
                'id_supplier' => '9',
                'no_nota' => '-',
                'sub_total' => '150000',
                'bayar' => '150000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-03-31 22:17:16',
                'updated_at' => '2023-03-31 22:17:16',
            ],[
                'id' => '51',
                'id_supplier' => '18',
                'no_nota' => 'FJ200400007',
                'sub_total' => '400000',
                'bayar' => '0',
                'hutang' => '-400000',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-04-01 22:17:16',
                'updated_at' => '2023-04-01 22:17:16',
            ],[
                'id' => '52',
                'id_supplier' => '19',
                'no_nota' => 'SN20040033',
                'sub_total' => '613800',
                'bayar' => '0',
                'hutang' => '-613800',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-04-01 22:17:16',
                'updated_at' => '2023-04-01 22:17:16',
            ],[
                'id' => '53',
                'id_supplier' => '6',
                'no_nota' => 'N010023',
                'sub_total' => '100000',
                'bayar' => '0',
                'hutang' => '-100000',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-04-06 22:17:16',
                'updated_at' => '2023-04-06 22:17:16',
            ],[
                'id' => '54',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '287000',
                'bayar' => '287000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-04-06 22:17:16',
                'updated_at' => '2023-04-06 22:17:16',
            ],[
                'id' => '55',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '160000',
                'bayar' => '160000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-04-15 22:17:16',
                'updated_at' => '2023-04-15 22:17:16',
            ],[
                'id' => '56',
                'id_supplier' => '1',
                'no_nota' => 'JLPST0038712',
                'sub_total' => '850025',
                'bayar' => '0',
                'hutang' => '-850025',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-04-16 22:17:16',
                'updated_at' => '2023-04-16 22:17:16',
            ],[
                'id' => '57',
                'id_supplier' => '20',
                'no_nota' => 'N308639',
                'sub_total' => '76500',
                'bayar' => '76500',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-04-16 22:17:16',
                'updated_at' => '2023-04-16 22:17:16',
            ],[
                'id' => '58',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '156000',
                'bayar' => '156000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-04-16 22:17:16',
                'updated_at' => '2023-04-16 22:17:16',
            ],[
                'id' => '59',
                'id_supplier' => '20',
                'no_nota' => 'N347040',
                'sub_total' => '76500',
                'bayar' => '76500',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-04-30 22:17:16',
                'updated_at' => '2023-04-30 22:17:16',
            ],[
                'id' => '60',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '88000',
                'bayar' => '88000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-04-30 22:17:16',
                'updated_at' => '2023-04-30 22:17:16',
            ],[
                'id' => '61',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '32500',
                'bayar' => '32500',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-05-02 22:17:16',
                'updated_at' => '2023-05-02 22:17:16',
            ],[
                'id' => '62',
                'id_supplier' => '13',
                'no_nota' => 'N724',
                'sub_total' => '6150034',
                'bayar' => '0',
                'hutang' => '-6150034',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-05-04 22:17:16',
                'updated_at' => '2023-05-04 22:17:16',
            ],[
                'id' => '63',
                'id_supplier' => '6',
                'no_nota' => 'N010147',
                'sub_total' => '1248000',
                'bayar' => '0',
                'hutang' => '-1248000',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-05-05 22:17:16',
                'updated_at' => '2023-05-05 22:17:16',
            ],[
                'id' => '64',
                'id_supplier' => '1',
                'no_nota' => 'JLPST0039',
                'sub_total' => '782100',
                'bayar' => '0',
                'hutang' => '-782100',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-05-11 22:17:16',
                'updated_at' => '2023-05-11 22:17:16',
            ],[
                'id' => '65',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '60000',
                'bayar' => '60000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-05-15 22:17:16',
                'updated_at' => '2023-05-15 22:17:16',
            ],[
                'id' => '66',
                'id_supplier' => '6',
                'no_nota' => 'N010202',
                'sub_total' => '100000',
                'bayar' => '0',
                'hutang' => '-100000',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-05-16 22:17:16',
                'updated_at' => '2023-05-16 22:17:16',
            ],[
                'id' => '67',
                'id_supplier' => '20',
                'no_nota' => 'N392484',
                'sub_total' => '76500',
                'bayar' => '76500',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-05-16 22:17:16',
                'updated_at' => '2023-05-16 22:17:16',
            ],[
                'id' => '68',
                'id_supplier' => '6',
                'no_nota' => 'N010211',
                'sub_total' => '195000',
                'bayar' => '0',
                'hutang' => '-195000',
                'status' => 'ok',
                'keterangan' => 'Hutang',
                'created_at' => '2023-05-18 22:17:16',
                'updated_at' => '2023-05-18 22:17:16',
            ],[
                'id' => '69',
                'id_supplier' => '14',
                'no_nota' => '-',
                'sub_total' => '13800',
                'bayar' => '13800',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-05-18 22:17:16',
                'updated_at' => '2023-05-18 22:17:16',
            ],[
                'id' => '70',
                'id_supplier' => '9',
                'no_nota' => '-',
                'sub_total' => '150000',
                'bayar' => '150000',
                'hutang' => '0',
                'status' => 'ok',
                'keterangan' => 'Lunas',
                'created_at' => '2023-05-30 22:17:16',
                'updated_at' => '2023-05-30 22:17:16',
            ]
        ];

        foreach ($pembelian as $key => $value){
            Pembelian::create($value);
        }
    }
}
