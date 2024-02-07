<script>
    $(function() {
        // let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
        // let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
        let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
        let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
        let printButtonTrans = '{{ trans('global.datatables.print') }}'
        let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'
        // let selectAllButtonTrans = '{{ trans('global.select_all') }}'
        // let selectNoneButtonTrans = '{{ trans('global.deselect_all') }}'

        let languages = {
            'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
        };

        $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {
            className: 'btn'
        })
        $.extend(true, $.fn.dataTable.defaults, {
            language: {
                url: languages['{{ app()->getLocale() }}']
            },

            columnDefs: [

            {
                // orderable: false,
                // className: 'select-checkbox',
                // targets: 0
            },

            {
                orderable: false,
                searchable: false,
                targets: -1
            }
        ],
            select: {
                style: 'multi+shift',
                selector: 'td:first-child'
            },
            order: [],
            scrollX: true,
            pageLength: 10,
            dom:    "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
                {
                    extend: 'excel',
                    className: 'btn btn-outline-primary',
                    text: '<i class="fas fa-file-excel"></i>',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    className: 'btn btn-outline-primary',
                    text: '<i class="fas fa-file-pdf"></i>',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    className: 'btn btn-outline-primary',
                    text: '<i class="fas fa-print"></i>',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'colvis',
                    className: 'btn btn-outline-primary',
                    text: '<i class="fas fa-th-list"></i>',
                    exportOptions: {
                        columns: ':visible'
                    }
                }

            ]
        });

        $.fn.dataTable.ext.classes.sPageButton = '';
    });
</script>


<script>
    // $(function() {
    //     $.extend(true, $.fn.dataTable.defaults, {
    //         orderCellsTop: true,
    //         lengthMenu: [
    //             [5, 10, 25, 50, 100, 200, -1],
    //             [5, 10, 25, 50, 100, 200, "All"]
    //         ],
    //         paging: true,
    //         searching: true,
    //         ordering: true,
    //         info: true,
    //         autoWidth: true,
    //         responsive: true,
    //     });
    //     let table = $('.desktop').DataTable()
    // })
    $(function() {
        $.extend(true, $.fn.dataTable.defaults, {
            dom:    "<'row'<'col-sm-6'l>  <'col-sm-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i> <'col-sm-7'p>>",
            orderCellsTop: true,
            lengthMenu: [
                [5, 10, 25, 50, 100, 200, -1],
                [5, 10, 25, 50, 100, 200, "All"]
            ],
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
        });
        let table = $('.desktop').DataTable()
    })
</script>





