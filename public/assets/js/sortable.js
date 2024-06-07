function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("sorTable");
    switching = true;
    dir = "asc";
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[n].innerHTML;
            y = rows[i + 1].getElementsByTagName("TD")[n].innerHTML;
            if (n !== 1 && n !== 2) {
                // For non-product name and non-cashier name columns, parse as float for numeric comparison
                x = parseFloat(x);
                y = parseFloat(y);
            } else {
                // For product name and cashier name columns, use locale-sensitive string comparison
                if (dir == "asc") {
                    if (x.localeCompare(y, undefined, { sensitivity: 'base' }) > 0) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.localeCompare(y, undefined, { sensitivity: 'base' }) < 0) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (dir == "asc") {
                if (x > y) {
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == "desc") {
                if (x < y) {
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount++;
        } else {
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}
