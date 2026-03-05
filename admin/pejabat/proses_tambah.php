if(strlen($nip) != 18){
    echo "<script>
            alert('NIP harus 18 digit!');
            window.history.back();
          </script>";
    exit;
}
