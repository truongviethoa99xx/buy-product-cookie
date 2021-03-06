$(function() {
    getStaffList();
    // $('#draggablePanelList').sortable({
    //     connectWith: '#draggablePanelList',
    //     update: function(event, ui) {
            
    //     }
    
    // });

    $('.save').on('click', function(e) {
        let array = []
        let data = {}
        $('.item').each(function() {
            let name = $(this).find('#name-card').text()
            let phone = $(this).find('.phone').text()
            let email = $(this).find('.email').text()
            let gender = $(this).find('.gender').text()
            let image = $(this).find('.image').attr('src');
            //console.log(name, phone, email, gender, image)
            data = {...data,name: name, phone: phone, email: email, gender: gender, image: image}
            array.push(data);
        })
        console.log(array)
    })
      

})

function getStaffList() {
    axios.get('http://127.0.0.1:8000/staff').then(res => {
        console.log(res);
        let htmls = res.data.map(data => {
            return `
            <div class="col-lg-12 col-xl-3 item">
            <div class="card-item">
              <div class="card__img">
                <img class="image" src="${data.image}" alt="" />
              </div>
              <h2 id="name-card">${data.name}</h2>
              <p class="gender">Giới tính: ${data.gender}</p>
              <div class="card__social">
                <a target="_black" class="card__social-link" href="#">
                  <i class="fab fa-facebook-f card__social-facebook"></i>
                  <div class="card__social-detail">
                    <p class="card__social-detail-title">Hello</p>
                  </div>
                </a>
                <a target="_black" class="card__social-link" href="#">
                  <i class="fa-solid fa-envelope card__social-email"></i>
                  <div class="card__social-detail card__social-detail--email">
                    <p class="card__social-detail-title" email>${data.email}</p>
                  </div>
                </a>
                <a target="_black" class="card__social-link" href="#">
                  <i class="fa-solid fa-phone card__social-phone"></i>
                  <div class="card__social-detail card__social-detail--phone">
                    <p class="card__social-detail-title phone"> ${data.phone}</p>
                  </div>
                </a>
                <a target="_black" class="card__social-link" href="#">
                  <i class="fab fa-github card__social-git"></i>
                  <div class="card__social-detail card__social-detail--git">
                    <p class="card__social-detail-title">Hello</p>
                  </div>
                </a>
              </div>
              <button>Xem chi tiết</button>
            </div>
          </div>
            `;
            
        });
        $('#draggablePanelList').html(htmls);
    })
}



