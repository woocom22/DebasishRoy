<section>
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h2 class="text-primary fw-bolder mb-0">Experience</h2>
        <a target="_blank" class="btn btn-primary px-4 py-3" id="downloadLink" href="">
            <div class="d-inline-block bi bi-download me-2"></div>
            Download Resume
        </a>
    </div>

    <!-- Experience Card 1-->
    <div id="experience-list" class="addExperience">

    </div>
</section>

<script>
    CVDownloadLink();
    async function CVDownloadLink(){
    let URL="/resume-link";                     // function resumeLink(Request $request)
                                                    // {
                                                    //     return DB::table('resumes')->first();
                                                    // }

        try {

        document.getElementById('loading-div').classList.remove('d-none');
        document.getElementById('container-div').classList.add('d-none');
        const res=await axios.get(URL);
        const link=res.data['downloadLink'];
        document.getElementById('downloadLink').setAttribute('href', link)
    }
    catch (error){
        alert(error)
    }
}


    GetExperienceList();
    async function GetExperienceList(){
        let URL="/experiencesData";
        try {
            const response=await axios.get(URL);
            response.data.forEach((item)=>{
                document.getElementById('experience-list').innerHTML+=(
                    `<div class="card shadow border-0 rounded-4 mb-5">
                        <div class="card-body p-5">
                            <div class="row align-items-center gx-5">
                                <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                    <div class="bg-light p-4 rounded-4">
                                        <div class="text-primary fw-bolder mb-2">${item['duration']}</div>
                                        <div class="small fw-bolder">${item['title']}</div>
                                        <div class="small text-muted">${item['designation']}</div>
                                        <div class="small text-muted">${item['location']}</div>
                                    </div>
                                </div>
                                <div class="col-lg-8"><div>${item['details']}</div></div>
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
