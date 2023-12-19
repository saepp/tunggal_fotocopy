<?php

function no_po($date)
{
    // database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fotocopy-tunggal";

    // create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // format date to match SQL syntax
    $date = date('Y-m-d', strtotime($date));

    // count existing no_po
    $sql = "SELECT COUNT(id_pemesanan_pembelian_header) as n FROM pemesanan_pembelian_header WHERE tgl_pemesanan = '$date'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $n = $row["n"];
    } else {
        $n = 0;
    }

    $n = $n + 1;
    $urut = sprintf("%03d", $n);

    $nomor = 'NPO' . date('Ymd', strtotime($date)) . $urut;

    $conn->close();

    return $nomor;
}

function no_pe($date)
{
    // database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fotocopy-tunggal";

// create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

// check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

// format date to match SQL syntax
    $date = date('Y-m-d', strtotime($date));

// count existing no_po
    $sql = "SELECT COUNT(id_penerimaan_pembelian_header) as n FROM penerimaan_pembelian_header WHERE tgl_pemesanan = '$date'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $n = $row["n"];
    } else {
        $n = 0;
    }

    $n = $n + 1;
    $urut = sprintf("%03d", $n);

    $nomor = 'NPE' . date('Ymd', strtotime($date)) . $urut;

    $conn->close();

    return $nomor;

}
