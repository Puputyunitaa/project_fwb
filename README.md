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




1. Role dan Fitur-fiturnya

Role	
Admin	
Fitur-fiturnya                       
•	Login
•	Lihat dashboard
•	Kelola user (tambah, edit, hapus, set role)
•	Kelola barang (tambah, edit, hapus)
•	Kelola kategori barang
•	Input barang masuk & keluar
•	Lihat semua transaksi
•	Lihat stok barang
•	Lihat riwayat transaksi
•	Validasi input (stok tidak boleh minus, data wajib diisi)


Staf                        	
Fitur-fiturnya                                
•	Login
•	Lihat dashboard sederhana
•	Lihat daftar barang
•	Input transaksi barang masuk
•	Input transaksi barang keluar
•	Lihat riwayat transaksi

role
Supervisior	                   
Fitur-fiturnya
•	Login                              
•	Lihat dashboard ringkasan
•	Lihat daftar barang & stok
•	Lihat transaksi masuk/keluar
•	Lihat riwayat transaksi

 
2. 🛠️ Tabel-tabel database beserta field dan tipe datanya

---

 🧑 Tabel `roles`
| Field       | Tipe Data   | Keterangan                         |
|-------------|-------------|------------------------------------|
| id          | INT         | Primary key, auto increment        |
| name        | VARCHAR(50) | Nama role: Admin, Staf, Supervisor |
| created_at  | TIMESTAMP   | Timestamp otomatis                 |
| updated_at  | TIMESTAMP   | Timestamp otomatis                 |

---

 👤 Tabel `users`
| Field       | Tipe Data     | Keterangan                          |
|-------------|---------------|-------------------------------------|
| id          | INT           | Primary key, auto increment         |
| name        | VARCHAR(100)  | Nama user/pengguna                  |
| email       | VARCHAR(100)  | Harus unik                          |
| password    | VARCHAR(255)  | Password terenkripsi                |
| role_id     | INT           | Foreign key → `roles.id`            |
| created_at  | TIMESTAMP     | Timestamp otomatis                  |
| updated_at  | TIMESTAMP     | Timestamp otomatis                  |

---

🏷️ Tabel `categories`
| Field       | Tipe Data     | Keterangan                          |
|-------------|---------------|-------------------------------------|
| id          | INT           | Primary key, auto increment         |
| name        | VARCHAR(100)  | Nama kategori barang                |
| created_at  | TIMESTAMP     | Timestamp otomatis                  |
| updated_at  | TIMESTAMP     | Timestamp otomatis                  |

---

📦 Tabel `items`
| Field        | Tipe Data     | Keterangan                          |
|--------------|---------------|-------------------------------------|
| id           | INT           | Primary key, auto increment         |
| name         | VARCHAR(100)  | Nama barang                         |
| category_id  | INT           | Foreign key → `categories.id`       |
| stock        | INT           | Jumlah stok barang                  |
| created_at   | TIMESTAMP     | Timestamp otomatis                  |
| updated_at   | TIMESTAMP     | Timestamp otomatis                  |

---
 🔄 Tabel `transactions`
| Field       | Tipe Data           | Keterangan                                      |
|-------------|---------------------|-------------------------------------------------|
| id          | INT                 | Primary key, auto increment                     |
| item_id     | INT                 | Foreign key → `items.id`                        |
| user_id     | INT                 | Foreign key → `users.id`                        |
| type        | ENUM('in','out')    | Jenis transaksi:'in'(masuk)atau'out'(keluar)    |
| quantity    | INT                 | Jumlah barang dalam transaksi                   |
| note        | TEXT (nullable)     | Keterangan tambahan (jika ada)                  |
| created_at  | TIMESTAMP           | Timestamp /Tanggal transaksi                    |
| updated_at  | TIMESTAMP           | Timestamp otomatis                              |

---

3. 🔗 Relasi Antar Tabel

- `users.role_id` → `roles.id` (**Many to One**)
- `items.category_id` → `categories.id` (**Many to One**)
- `transactions.item_id` → `items.id` (**Many to One**)
- `transactions.user_id` → `users.id` (**Many to One**)

users  roles
•	Relasi: Many to One
•	Artinya: Banyak user bisa punya satu role
•	Implementasi:
o	users.role_id mengarah ke roles.id

items ➡ categories
•	Relasi: Many to One
•	Artinya: Banyak barang termasuk dalam satu kategori
•	Implementasi:
o	items.category_id mengarah ke categories.id

transactions ➡ items
•	Relasi: Many to One
•	Artinya: Banyak transaksi bisa melibatkan satu barang
•	Implementasi:
o	transactions.item_id mengarah ke items.id

transactions ➡ users
•	Relasi: Many to One
•	Artinya: Banyak transaksi dilakukan oleh satu user (Admin/Staf)
•	Implementasi:
o	transactions.user_id mengarah ke users.id
