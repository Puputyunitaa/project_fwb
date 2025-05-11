<h2 align="center">SISTEM PENGELOLAAN STOK BARANG JUALAN TOKO</h2>



<p align="center">
  <img src="https://github.com/user-attachments/assets/b3088b20-7691-4817-a7fc-00c03144bc15" alt="Logo unsulbar" width="200"/>
</p>


<p align="center">
  <strong>PUPUT YUNITA</strong><br/><br/>
  <strong>D0223524</strong><br/><br/>
  <strong>FREMWORK WEB BASED</strong><br/><br/>
  <strong>2025</strong>
</p>




1.Admin
Fitur-fiturnya:
Login
Lihat dashboard
Kelola user (tambah, edit, hapus, set role)
Kelola barang (tambah, edit, hapus)
Kelola kategori barang
Input barang masuk & keluar
Lihat semua transaksi
Lihat stok barang
Lihat riwayat transaksi
Validasi input (stok tidak boleh minus, data wajib diisi)

2 Staf
Fitur-fiturnya:
Login
Lihat dashboard sederhana
Lihat daftar barang
Input transaksi barang masuk
Input transaksi barang keluar
Lihat riwayat transaksi

3 Supervisor
Fitur-fiturnya:
Login
Lihat dashboard ringkasan
Lihat daftar barang & stok
Lihat transaksi masuk/keluar
Lihat riwayat transaksi

 
2. 🛠️ Tabel-tabel database beserta field dan tipe datanya

---

 ### 🧑 Tabel `roles`
| Field       | Tipe Data   | Keterangan                         |
|-------------|-------------|------------------------------------|
| id          | INT         | Primary key, auto increment        |
| name        | VARCHAR(50) | Nama role: Admin, Staf, Supervisor |
| created_at  | TIMESTAMP   | Timestamp otomatis                 |
| updated_at  | TIMESTAMP   | Timestamp otomatis                 |

---

### 👤 Tabel `users`
| Field       | Tipe Data     | Keterangan                          |
|-------------|---------------|-------------------------------------|
| id          | INT           | Primary key, auto increment         |
| name        | VARCHAR(100)  | Nama user                           |
| email       | VARCHAR(100)  | Harus unik                          |
| password    | VARCHAR(255)  | Password terenkripsi                |
| role_id     | INT           | Foreign key → `roles.id`            |
| created_at  | TIMESTAMP     | Timestamp otomatis                  |
| updated_at  | TIMESTAMP     | Timestamp otomatis                  |

---

### 👤 Tabel `profiles` (One to One dengan users)
| Field     Role dan Fitur-fiturnya
   | Tipe Data     | Keterangan                          |
|-------------|---------------|-------------------------------------|
| id          | INT           | Primary key, auto increment         |
| user_id     | INT           | Foreign key → `users.id`, Unique    |
| phone       | VARCHAR(20)   | Nomor telepon                       |
| address     | TEXT          | Alamat                              |
| created_at  | TIMESTAMP     | Timestamp otomatis                  |
| updated_at  | TIMESTAMP     | Timestamp otomatis                  |

---

### 🏷️ Tabel `categories`
| Field       | Tipe Data     | Keterangan                          |
|-------------|---------------|-------------------------------------|
| id          | INT           | Primary key, auto increment         |
| name        | VARCHAR(100)  | Nama kategori barang                |
| created_at  | TIMESTAMP     | Timestamp otomatis                  |
| updated_at  | TIMESTAMP     | Timestamp otomatis                  |

---

### 📦 Tabel `products`
| Field        | Tipe Data     | Keterangan                          |
|--------------|---------------|-------------------------------------|
| id           | INT           | Primary key, auto increment         |
| name         | VARCHAR(100)  | Nama produk                         |
| category_id  | INT           | Foreign key → `categories.id`       |
| stock        | INT           | Jumlah stok barang                  |
| price        | DECIMAL(10,2) | Harga produk                        |
| created_at   | TIMESTAMP     | Timestamp otomatis                  |
| updated_at   | TIMESTAMP     | Timestamp otomatis                  |

---

### 🏢 Tabel `suppliers`
| Field       | Tipe Data     | Keterangan                          |
|-------------|---------------|-------------------------------------|
| id          | INT           | Primary key, auto increment         |
| name        | VARCHAR(100)  | Nama supplier                       |
| phone       | VARCHAR(20)   | Nomor telepon                       |
| address     | TEXT          | Alamat                              |
| created_at  | TIMESTAMP     | Timestamp otomatis                  |
| updated_at  | TIMESTAMP     | Timestamp otomatis                  |

---

### 📦 Tabel `product_supplier` (Many to Many)
| Field        | Tipe Data     | Keterangan                          |
|--------------|---------------|-------------------------------------|
| id           | INT           | Primary key, auto increment         |
| product_id   | INT           | Foreign key → `products.id`         |
| supplier_id  | INT           | Foreign key → `suppliers.id`        |
| created_at   | TIMESTAMP     | Timestamp otomatis                  |
| CONSTRAINT   | UNIQUE        | `product_id` dan `supplier_id` unik |

---

**Relasi Antar Tabel**:

- `users.role_id` → `roles.id` (**Many to One**)
- `products.category_id` → `categories.id` (**Many to One**)
- `profiles.user_id` → `users.id` (**One to One**)
- `product_supplier.product_id` → `products.id` (**Many to Many**)
- `product_supplier.supplier_id` → `suppliers.id` (**Many to Many**)
Users → Roles (Many to One)
Setiap pengguna memiliki satu role (Admin, Staf, Supervisor), namun satu role bisa dimiliki banyak pengguna.

Products → Categories (Many to One)
Setiap produk memiliki satu kategori, tapi satu kategori bisa memiliki banyak produk.

Profiles → Users (One to One)
Setiap pengguna hanya memiliki satu profil, dan satu profil hanya untuk satu pengguna.

Product_Supplier → Products (Many to Many)
Satu produk bisa disuplai oleh banyak supplier, dan satu supplier bisa menyuplai banyak produk.

Product_Supplier → Suppliers (Many to Many)
Satu supplier bisa menyuplai banyak produk, dan satu produk bisa disuplai oleh banyak supplier.
