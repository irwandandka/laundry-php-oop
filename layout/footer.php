            </div>
        </div>

        <script src="./public/js/bootstrap.bundle.min.js"></script>
        <script>
            let formDetailTransaksi = document.querySelector('.form-detail-transaksi');
            let btnCloseFormDetailTransaksi = document.querySelector('.btn-close-form-detail-transaksi');
            let btnShowFormDetailTransaksi = document.querySelector('.btn-show-form-detail-transaksi');
            btnShowFormDetailTransaksi.addEventListener('click', function() {
                formDetailTransaksi.classList.remove('d-none');
                formDetailTransaksi.classList.add('d-block');
            });

            btnCloseFormDetailTransaksi.addEventListener('click', function() {
                formDetailTransaksi.classList.remove('d-block');
                formDetailTransaksi.classList.add('d-none');
            });
        </script>
    </body>
</html>