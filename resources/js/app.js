import * as bootstrap from "bootstrap";
import axios from "axios";
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

// window.addEventListener('load', () => {
//     axios.get(getMechanic)
//         .then(res => {
//             document.querySelector('.filter--mech').innerHTML = res.data.html;
//         })
// });


// const selector = document.querySelector("[name=shop_id]");
// selector.addEventListener('change', () => {
//    const id = selector.value;
//     axios.post(addFilter, {id}).then(res => console.log(res.data))
// })


// if (document.querySelector(".magic--rating")) {
//     // const magicLink = document.querySelector(".magic--rating");
//     // const selector = document.querySelector(".mol");
//     const mms = document.querySelector(".mms");

    
//     document.querySelectorAll(".mol")
//     .forEach(e => {
//         e.addEventListener('change', () => {
//             // const formGroup = e.closest('.form-group');
//             const rate = e.querySelector('input[name="star"]:checked').value;
//             console.log(rate);
//             mms.setAttribute('value', rate)
//             // axios.post(showUrl, {rate}).then(res => console.log(res.data))
//         })
//     })

    
// }
