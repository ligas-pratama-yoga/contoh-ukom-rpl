function setModal(e, class_name) {
    // Buat modal

    let modal = new bootstrap.Modal(`#${class_name}`, {})
    // Tampilkan modal
    modal.show()
    // Ubah modal menjadi querySelector biasa
    modal = document.querySelector(`#${class_name}`)

    // Ambil data dari attribute datas-entity
    let datas_raw = e.getAttribute("datas-entity") ?? "[]"
    // Ubah data menjadi JSON 
    let datas = JSON.parse(datas_raw)

    // value dari setiap input diubah sesuai dengan data JSON
    let form = modal.querySelector("form")
    if (/\d+/.test(form.getAttribute("action")) == false) {
        form.setAttribute("action", form.getAttribute("action") + datas[0])
    } else {
        let test = form.getAttribute("action").replace(/\d+/, datas[0])
        form.setAttribute("action", test)
    }



    let allInput = modal.querySelectorAll("input:not([name='_method'])");
    // Jika allInput bukan kosong
    let data_other = e.getAttribute("data-other")
    let option = modal.querySelector("select > option[selected]");

    if (allInput != {} && (option == null || option == undefined )) {
        for (const [i, e] of datas.entries()) {
            allInput[i].value = e
        }
    } else { 
        allInput.forEach((e, i) => {
            if(i == 1) i++;
            if(e.getAttribute("type") == "date") {
                e.value = datas[datas.length - 1]
                return;
            }

            e.value = datas[i];
        }); 
        option.value = data_other;
        option.innerText = datas[1];
    }
}
