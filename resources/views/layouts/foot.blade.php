<x-notify::notify />
@notifyJs

<script src="{{ asset('template/back/dist/libs/apexcharts/dist/apexcharts.min.js?1692870487') }}" defer></script>
<script src="{{ asset('template/back/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487') }}" defer></script>
<script src="{{ asset('template/back/dist/libs/jsvectormap/dist/maps/world.js?1692870487') }}" defer></script>
<script src="{{ asset('template/back/dist/libs/jsvectormap/dist/maps/world-merc.js?1692870487') }}" defer></script>
<!-- Tabler Core -->
<script src="{{ asset('template/back/dist/js/tabler.min.js?1692870487') }}" defer></script>
<script src="{{ asset('template/back/dist/js/demo.min.js?1692870487') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
<script>
    $('#example').DataTable({
        language: {
            search: 'Cari:',
            lengthMenu: 'Menampilkan _MENU_ data',
            info: "Menampilkan _START_ ke _END_ dari _TOTAL_ data",
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 120
        });
    });
</script>
<script src="{{ asset('template/back/dist/libs/tom-select/dist/js/tom-select.base.min.js?1692870487') }}" defer>
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var el;
        window.TomSelect && (new TomSelect(el = document.getElementById('select-tags'), {
            copyClassesToDropdown: false,
            dropdownParent: 'body',
            controlInput: '<input>',
            render: {
                item: function(data, escape) {
                    if (data.customProperties) {
                        return '<div><span class="dropdown-item-indicator">' + data
                            .customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                },
                option: function(data, escape) {
                    if (data.customProperties) {
                        return '<div><span class="dropdown-item-indicator">' + data
                            .customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                },
            },
        }));
    });
</script>

{{-- handle nip ajax buat tiket --}}
{{-- <script>
    $('#nip').on('input', function() {
        var nip = $(this).val()

        if (nip.length >= 8) {
            $.ajax({
                url: "<?= base_url('jenis_pengaduan/search/') ?>" + pengaduan,
                success: function(result) {
                    result = JSON.parse(result)
                    if (result.data) {
                        result.data.forEach(element => {
                            // alert(element.nama_sub)
                            $('#sub_pengaduan').append(`<option class="subb" value="${element.id_sub}">${element.nama_sub} </option>`);
                        });
                        $('#sub').removeClass('d-none');
                        $('#sub_pengaduan').attr('required');
                    } else {
                        $('#sub').addClass('d-none')

                    }
                }
            })
        }
    })
</script> --}}
