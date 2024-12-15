<section class="py-5">
    <div class="container px-5 mb-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Projects</span></h1>
        </div>
        <div id="project-list" class="row gx-5 justify-content-center">
                {{--        loop start here [foreacht loop]        --}}
        </div>
    </div>
</section>

<script>
    GetProjectList();
   async function GetProjectList(){
       let URL="/project-details"
       try{
           // loader show and content hide
           document.getElementById('loading-div').classList.remove('d-none');
           document.getElementById('container-div').classList.add('d-none');
           const response= await axios.get(URL);              // When use await, First exe. the 1st line [const result= await axios.get(URL);] and after procced the next step
           // Hide loader
           document.getElementById('loading-div').classList.add('d-none');
           document.getElementById('container-div').classList.remove('d-none');
           response.data.forEach((item)=>{                    //   => this is call-back function
               document.getElementById('project-list').innerHTML+=(                     // `` This symbol is called backtick. When HTML use in javascript it will be use . into the HTML ${} use for insert javascript
                   `<div id="project-list" class="col-lg-11 col-xl-9 col-xxl-8">
                        <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center">
                                    <div class="p-5">
                                        <h2 class="fw-bolder">${item['title']}</h2>
                                        <p>${item['details']}</p>
                                        <a href='${item['previewLink']}' target="_blank" class="text-decoration-none">Preview Project</a>
                                    </div>
                                    <img class="img-fluid" src='${item['thumbnailLink']}' alt="..." />
                                </div>
                            </div>
                        </div>
                    </div>`
               )
           })
       }
       catch (error){
            alert(error)
       }
    }
</script>
