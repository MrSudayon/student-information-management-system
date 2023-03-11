//const m_Up = document.querySelector('manual');
//const e_Up = document.querySelector('excel');

//m_Up.addEventListener('click', function() {
//    addclass.document.querySelector('mnl_Up') = 'mnl_Up manUpl';

//});
 




function toggleVisibility(id, buttonId) {
    const man_Upl = document.getElementById('manual-up');
    const xcl_Upl = document.getElementById('excel-up');
    const btn_Upl = document.getElementById('btn_Upload');

        if (xcl_Upl.style.display == 'none') {
            xcl_Upl.style.display = 'block';
            man_Upl.style.display = 'none';
            btn_Upl.innerHTML = 'MANUAL UPLOAD';
        } else {
            xcl_Upl.style.display = 'none';
            man_Upl.style.display = 'block';
            btn_Upl.innerHTML = 'EXCEL UPLOAD';
        }
}