-- =========================================================
-- Database: db_tis
-- =========================================================
CREATE DATABASE IF NOT EXISTS db_tis;
USE db_tis;

-- =========================================================
-- Table: almt_provinsi
-- =========================================================
CREATE TABLE almt_provinsi (
    id_provinsi CHAR(2) PRIMARY KEY,
    provinsi VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================================================
-- Table: almt_kabupaten
-- =========================================================
CREATE TABLE almt_kabupaten (
    id_kabupaten CHAR(4) PRIMARY KEY,
    kabupaten VARCHAR(50) NOT NULL,
    id_provinsi CHAR(2) NOT NULL,
    CONSTRAINT fk_kabupaten_provinsi FOREIGN KEY (id_provinsi)
        REFERENCES almt_provinsi (id_provinsi)
        ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================================================
-- Table: almt_kecamatan
-- =========================================================
CREATE TABLE almt_kecamatan (
    id_kecamatan CHAR(6) PRIMARY KEY,
    kecamatan VARCHAR(50) NOT NULL,
    id_kabupaten CHAR(4) NOT NULL,
    CONSTRAINT fk_kecamatan_kabupaten FOREIGN KEY (id_kabupaten)
        REFERENCES almt_kabupaten (id_kabupaten)
        ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================================================
-- Table: almt_desa
-- =========================================================
CREATE TABLE almt_desa (
    id_desa CHAR(10) PRIMARY KEY,
    desa VARCHAR(50) NOT NULL,
    id_kecamatan CHAR(6) NOT NULL,
    CONSTRAINT fk_desa_kecamatan FOREIGN KEY (id_kecamatan)
        REFERENCES almt_kecamatan (id_kecamatan)
        ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================================================
-- Table: jabatan
-- =========================================================
CREATE TABLE jabatan (
    id_jabatan INT(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    jabatan VARCHAR(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================================================
-- Table: person
-- =========================================================
CREATE TABLE person (
    id_person SMALLINT(5) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(50) NOT NULL,
    jk ENUM('L','P') NOT NULL,
    tempat_lahir VARCHAR(30),
    tanggal_lahir DATE,
    kewarganegaraan VARCHAR(30),
    golongan_darah ENUM('A','B','AB','O'),
    nik VARCHAR(16),
    nomor_kk VARCHAR(16),
    alamat VARCHAR(100),
    rt CHAR(3),
    rw CHAR(3),
    id_desa CHAR(10),
    npwp VARCHAR(30),
    nomor_hp VARCHAR(16),
    email VARCHAR(100),
    foto VARCHAR(36),
    id_jabatan INT(10) UNSIGNED,
    CONSTRAINT fk_person_desa FOREIGN KEY (id_desa)
        REFERENCES almt_desa (id_desa)
        ON UPDATE CASCADE ON DELETE SET NULL,
    CONSTRAINT fk_person_jabatan FOREIGN KEY (id_jabatan)
        REFERENCES jabatan (id_jabatan)
        ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
