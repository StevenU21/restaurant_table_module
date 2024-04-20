<script>
    document.querySelectorAll('.downloadInvoiceBtn').forEach(button => {
        button.addEventListener('click', function() {
            var invoiceId = this.getAttribute('data-invoice-id');
            var url = "{{ route('invoices.download', ':id') }}".replace(':id', invoiceId);

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    var filenameHeader = response.headers.get('Content-Disposition');
                    var match = /filename="(.*)"/.exec(filenameHeader);
                    var filename = match ? match[1] : 'invoice.pdf';
                    return response.blob().then(blob => ({
                        blob,
                        filename
                    }));
                })
                .then(({
                    blob,
                    filename
                }) => {
                    var url = window.URL.createObjectURL(blob);

                    var a = document.createElement('a');
                    a.href = url;
                    a.download = filename;
                    document.body.appendChild(a);
                    a.click();

                    // Limpiar el objeto URL y eliminar el enlace temporal
                    window.URL.revokeObjectURL(url);
                    document.body.removeChild(a);
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Ha ocurrido un error al descargar la factura.');
                });
        });
    });
</script>
