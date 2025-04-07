* Ini adalah repository UKOM/UKK RPL SMKN 8 Pandeglang tahun 2025 paket 3 tentang kasir
  
  Database yang diperlukan, 
    1. Driver postgresql
    2. Sebuah database bernama "kasir"
    3. Di dalam database itu ada 5 tabel yang dirinci sebagai
      1. produk,
          id(bigint/int8, not null, auto_increment)->primary key
          nama(varchar, not null)
          harga(bigint/int8, not null)
          stok(int4, not null)
          deleted_at(date, null)
      2. pelanggan
          id(bigint/int8, not null, auto_increment)->primary key
          nama(varchar)
          alamat(varchar)
          nomor_telepon(varchar)
          deleted_at(date, null)
      3. users
          id(bigint/int8, not null, auto_increment)->primary key
          nama(varchar)
          email(varchar)
          password(text)
          deleted_at(date, null)
      4. transaksi
          id(bigint/int8, not null, auto_increment)->primary key
          id_pelanggan(bigint/int8, not null)->foreign key(pelanggan.id)
          tanggal_transaksi(date, now())
          status_pembayaran(varchar)
          deleted_at(date, null)
      5. items_transaksi
          id(bigint/int8, not null, auto_increment)->primary key
          id_produk(bigint/int8, not null)->foreign key(produk.id)
          id_transaksi(int8)->foreign key(transaksi.id)
          subtotal(int4)
          deleted_at(date, null)
