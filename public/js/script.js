
function populate(name) {
    document.getElementById('name').value = document.getElementById(name+'.1').innerHTML;
    document.getElementById('race').value = document.getElementById(name+'.2').innerHTML;
    document.getElementById('class').value = document.getElementById(name+'.3').innerHTML;
    if(document.getElementById(name+'.4').innerHTML == 'Active') {
        document.getElementById('status').selectedIndex = '0';
    } else if(document.getElementById(name+'.4').innerHTML == 'Inactive') {
        document.getElementById('status').selectedIndex = '1';
    } else {
        document.getElementById('status').selectedIndex = '2';
    }
    document.getElementById('level').value = document.getElementById(name+'.5').innerHTML;
    document.getElementById('str').value = document.getElementById(name+'.6').innerHTML;
    document.getElementById('dex').value = document.getElementById(name+'.7').innerHTML;
    document.getElementById('con').value = document.getElementById(name+'.8').innerHTML;
    document.getElementById('int').value = document.getElementById(name+'.9').innerHTML;
    document.getElementById('wis').value = document.getElementById(name+'.10').innerHTML;
    document.getElementById('cha').value = document.getElementById(name+'.11').innerHTML;
    document.getElementById('max-hp').value = document.getElementById(name+'.12').innerHTML;
    document.getElementById('current-hp').value = document.getElementById(name+'.13').innerHTML;
    document.getElementById('gold').value = document.getElementById(name+'.14').innerHTML;
    document.getElementById('armor').value = document.getElementById(name+'.15').innerHTML;
    document.getElementById('armor-ac-bonus').value = document.getElementById(name+'.16').innerHTML;
    document.getElementById('weapon').value = document.getElementById(name+'.17').innerHTML;
    if(document.getElementById(name+'.18').innerHTML.replace(/\s+/g, '') == 'Melee') {
        document.getElementById('ranged-or-melee').selectedIndex = '1';
    } else {
        document.getElementById('ranged-or-melee').selectedIndex = '0';
    }
    document.getElementById('max-weapon-dmg').value = document.getElementById(name+'.19').innerHTML;
    document.getElementById('id').value = name;
}

function deleteData() {
    document.getElementById('opp').value = 'delete';
    document.getElementById('form').submit();
}

function createData() {
    document.getElementById('opp').value = 'create';
    document.getElementById('form').submit();
}

