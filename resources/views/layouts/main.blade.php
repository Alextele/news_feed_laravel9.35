<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=0.8, maximum-scale=0.8, minimum-scale=0.8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News</title>
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body style="width: 80%; margin: 20px auto ">
@yield('content')
</body>
<script>
    $(document).ready(function () {
        function naturalSort (a, b, html) {
            var re = /(^-?[0-9]+(\.?[0-9]*)[df]?e?[0-9]?%?$|^0x[0-9a-f]+$|[0-9]+)/gi,
                sre = /(^[ ]*|[ ]*$)/g,
                dre = /(^([\w ]+,?[\w ]+)?[\w ]+,?[\w ]+\d+:\d+(:\d+)?[\w ]?|^\d{1,4}[\/\-]\d{1,4}[\/\-]\d{1,4}|^\w+, \w+ \d+, \d{4})/,
                hre = /^0x[0-9a-f]+$/i,
                ore = /^0/,
                htmre = /(<([^>]+)>)/ig,
                // convert all to strings and trim()
                x = a.toString().replace(sre, '') || '',
                y = b.toString().replace(sre, '') || '';
            // remove html from strings if desired
            if (!html) {
                x = x.replace(htmre, '');
                y = y.replace(htmre, '');
            }
            // chunk/tokenize
            var xN = x.replace(re, '\0$1\0').replace(/\0$/,'').replace(/^\0/,'').split('\0'),
                yN = y.replace(re, '\0$1\0').replace(/\0$/,'').replace(/^\0/,'').split('\0'),
                // numeric, hex or date detection
                xD = parseInt(x.match(hre), 10) || (xN.length !== 1 && x.match(dre) && Date.parse(x)),
                yD = parseInt(y.match(hre), 10) || xD && y.match(dre) && Date.parse(y) || null;

            // first try and sort Hex codes or Dates
            if (yD) {
                if ( xD < yD ) {
                    return -1;
                }
                else if ( xD > yD ) {
                    return 1;
                }
            }

            // natural sorting through split numeric strings and default strings
            for(var cLoc=0, numS=Math.max(xN.length, yN.length); cLoc < numS; cLoc++) {
                // find floats not starting with '0', string or 0 if not defined (Clint Priest)
                var oFxNcL = !(xN[cLoc] || '').match(ore) && parseFloat(xN[cLoc], 10) || xN[cLoc] || 0;
                var oFyNcL = !(yN[cLoc] || '').match(ore) && parseFloat(yN[cLoc], 10) || yN[cLoc] || 0;
                // handle numeric vs string comparison - number < string - (Kyle Adams)
                if (isNaN(oFxNcL) !== isNaN(oFyNcL)) {
                    return (isNaN(oFxNcL)) ? 1 : -1;
                }
                // rely on string comparison if different types - i.e. '02' < 2 != '02' < '2'
                else if (typeof oFxNcL !== typeof oFyNcL) {
                    oFxNcL += '';
                    oFyNcL += '';
                }
                if (oFxNcL < oFyNcL) {
                    return -1;
                }
                if (oFxNcL > oFyNcL) {
                    return 1;
                }
            }
            return 0;
        };

        jQuery.extend( jQuery.fn.dataTableExt.oSort, {
            "natural-asc": function (a, b) {
                return naturalSort(a, b, true);
            },

            "natural-desc": function (a, b) {
                return naturalSort(a, b, true) * -1;
            },

            "date-uk-pre": function ( a ) {
                var ukDatea = a.split('/');
                return (ukDatea[2] + ukDatea[1] + ukDatea[0]) * 1;
            },

            "date-uk-asc": function ( a, b ) {
                return ((a < b) ? -1 : ((a > b) ? 1 : 0));
            },

            "date-uk-desc": function ( a, b ) {
                return ((a < b) ? 1 : ((a > b) ? -1 : 0));
            }
        });

        $('#example').DataTable({
            "order": [[ 0, "desc" ]],
            "aoColumns": [
                null,
                { "sType": "natural" },
                null,
                { "sType": "date-uk" }
            ],
        });
    });
</script>
</html>
