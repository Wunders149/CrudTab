function mergeCells(selectedCells) {
    if (!selectedCells || !selectedCells.length) {
      console.warn("No cells selected for merging.");
      return;
    }
  
    var minRow = Infinity, maxRow = -Infinity, minCol = Infinity, maxCol = -Infinity;
  
    selectedCells.forEach(function(cellKey) {
      var indices = cellKey.split('-');
      var rowIndex = parseInt(indices[0]);
      var cellIndex = parseInt(indices[1]);
  
      minRow = Math.min(minRow, rowIndex);
      maxRow = Math.max(maxRow, rowIndex);
      minCol = Math.min(minCol, cellIndex);
      maxCol = Math.max(maxCol, cellIndex);
    });
  
    $('td.selected').removeClass('selected');
  
    var topLeftCell = $('tr').eq(minRow).find('td').eq(minCol);
    topLeftCell.addClass('selected')
        .text(calculateMergedCellValue(selectedCells))
        .attr('colspan', maxCol - minCol + 1)
        .attr('rowspan', maxRow - minRow + 1);
  
    for (var i = minRow; i <= maxRow; i++) {
      for (var j = minCol; j <= maxCol; j++) {
        if (i !== minRow || j !== minCol) {
          $('tr').eq(i).find('td').eq(j).hide();
        }
      }
    }
  }
  
  function calculateMergedCellValue(selectedCells) {
    var mergedValue = "";
    selectedCells.forEach(function(cellKey) {
      mergedValue += $('tr').eq(parseInt(cellKey.split('-')[0])).find('td').eq(parseInt(cellKey.split('-')[1])).text() + ", ";
    });
    return mergedValue.slice(0, -2);
  }  

$(document).ready(function() {
    var rows, cols;
    var selectedCells = [];

    // Créer le tableau en fonction du nombre de lignes et colonnes
    function createTable() {
        var data = {
            rows: rows,
            cols: cols
        };

        $.ajax({
            type: "POST",
            url: "../php/table.php",
            data: data,
            success: function(response) {
                $('#table-container').html(response);
            }
        });
    }

    // Demander à l'utilisateur le nombre de lignes et colonnes
    $('#create-table').on('click', function() {
        rows = parseInt(prompt('Enter number of rows:'));
        cols = parseInt(prompt('Enter number of columns:'));

        if (rows && cols) {
            createTable();
        } else {
            alert('Please enter valid numbers for rows and columns.');
        }
    });

    // Gérer la sélection des cellules
    $('#table-container').on('click', 'td', function() {
        var cellIndex = $(this).index();
        var rowIndex = $(this).closest('tr').index();
        var cellKey = rowIndex + '-' + cellIndex;

        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
            var index = selectedCells.indexOf(cellKey);
            if (index !== -1) {
                selectedCells.splice(index, 1);
            }
        } else {
            $(this).addClass('selected');
            selectedCells.push(cellKey);
        }

        if (selectedCells.length > 1) {
            mergeCells(selectedCells);
        }
    });
});