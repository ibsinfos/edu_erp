!function (a) {
    a.fn.dataTableExt.oStdClasses.sPageButton = "btn-flat small waves-effect", a(document).ready(function () {
        a(".datatable").each(function () {
            var e = a(this);
            e.DataTable({fnInitComplete: function (a, t) {
                    var l = e.parents(".dataTables_wrapper").eq(0);
                    l.find(".dataTables_length").addClass("input-field"), l.find(".dataTables_length label select").prependTo(l.find(".dataTables_length")), l.find(".dataTables_length select").material_select(), l.find(".dataTables_filter").addClass("input-field"), l.find(".dataTables_filter").addClass("without-search-bar"), l.find(".dataTables_filter label input").prependTo(l.find(".dataTables_filter"))
                }, language: {lengthMenu: "Per page: _MENU_"}, dom: "<'row no-gutter'\t<'col s12 m2'l>\t<'col s12 offset-m6 m4'f>><''tr><'row no-gutter'\t<'col s12 m4'i>\t<'col s12 m8'p>>"})
        })
    })
}(jQuery);