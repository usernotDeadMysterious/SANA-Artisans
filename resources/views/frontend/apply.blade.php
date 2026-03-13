@extends('layouts.public')

@section('content')

    <section class="bg-yellow-500/55 py-10 text-white">
        <div class="max-w-4xl mx-auto px-3 text-center">
            <h1 class="text-2xl md:text-3xl font-bold">
                Join Our <span class="text-indigo-700">Verified Artisan Network</span>
            </h1>
            <p class="mt-4 text-indigo-600 max-w-2xl mx-auto">
                Submit your professional profile for review. Approved artists are featured in our public directory.
            </p>
        </div>
    </section>

    <section class="bg-slate-100 py-6">
        <div class="max-w-4xl mx-auto px-6">

            @if(session('success'))
                <div class="mb-6 rounded-lg bg-emerald-50 border border-emerald-200 p-4 text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 rounded-lg bg-red-50 border border-red-200 p-4 text-red-600">
                    <ul class="list-disc pl-5 space-y-1 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form method="POST" action="/apply" enctype="multipart/form-data"
                class="bg-white rounded-2xl shadow-lg p-8 space-y-4">
                @csrf


                <!-- PERSONAL -->
                <div>
                    <h2 class="text-xl font-semibold mb-4">Personal Information</h2>

                    <div class="grid md:grid-cols-2 gap-3">

                        <div>
                            <label class="block text-sm mb-2">Full Name</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500"
                                placeholder="e.g John Doe">
                        </div>

                        <div>
                            <label class="block text-sm mb-2">Age</label>
                            <input type="number" name="age" value="{{ old('age') }}"
                                class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500"
                                placeholder="e.g 18">
                        </div>
                        <div>
                            <label>Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="w-full border p-2 rounded"
                                placeholder="e.g: john@example.com">
                        </div>
                        <div>
                            <label class="block text-sm mb-2">Gender</label>
                            <select name="gender"
                                class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm mb-2">Contact Information</label>
                            <input type="text" name="contact" value="{{ old('contact') }}"
                                class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500"
                                placeholder="e.g 923101213145">
                        </div>

                    </div>
                </div>


                <!-- PROFESSIONAL -->
                <div class="border-t pt-3">
                    <h2 class="text-xl font-semibold mb-4">Professional Information</h2>

                    <div class="grid md:grid-cols-2 gap-6">

                        <div>
                            <label class="block text-sm mb-2">Education</label>
                            <input type="text" name="qualification"
                                class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500"
                                placeholder="Matric / F.Sc / BS-CS">
                        </div>

                        <div>
                            <label class="block text-sm mb-2">Trade</label>

                            <select id="tradeSelect"
                                class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500">

                                <option value="">Select Trade</option>
                                <option value="Tailoring">Tailoring</option>
                                <option value="Beautician">Beautician</option>
                                <option value="Cooking">Cooking</option>
                                <option value="Digital">Digital Skills</option>

                            </select>
                        </div>
                        <!-- SKILLS -->
                        <div>
                            <label class="block text-sm mb-2">Skills (max 3)</label>

                            <select id="skillsDropdown"
                                class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500">

                                <option value="">Select Skill</option>
                                <option>Web Development</option>
                                <option>Web Design</option>
                                <option>SEO</option>
                                <option>Digital Marketing</option>
                                <option>Graphic Design</option>
                                <option>UI/UX Design</option>
                                <option>App Development</option>
                                <option>WordPress Development</option>
                                <option>Shopify Development</option>
                                <option>Laravel Development</option>
                                <option>React Development</option>
                                <option>Video Editing</option>
                                <option>Content Writing</option>
                                <option>Social Media Management</option>
                                <option>Photography</option>
                                <option>Cooking</option>
                                <option>Tailoring</option>
                                <option>Embroidery</option>
                                <option>Arts & Crafts</option>
                                <option>Beautician</option>
                                <option>Tourism</option>
                                <option>Hospitality</option>
                                <option>Marble Mosaic</option>
                                <option value="Other">Other</option>

                            </select>

                            <input id="manualSkill" type="text" placeholder="Enter custom skill and press Enter"
                                class="hidden mt-3 w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500">

                            <div id="skillsContainer" class="flex flex-wrap gap-2 mt-3"></div>

                            <input type="hidden" name="specialization" id="skillsInput">

                        </div>

                        {{-- current_status --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm mb-2">Current Status</label>
                            <select name="current_status"
                                class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500">
                                <option value="other"> Select Status</option>
                                <option value="student">Student</option>
                                <option value="own_business">Own Business</option>
                                <option value="employee">Employee</option>
                                <option value="unemployed">Unemployed</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                    </div>


                    <div class="mt-6">
                        <label class="block text-sm mb-2">Professional Experience</label>
                        <textarea name="experience"
                            class="w-full border border-slate-300 rounded-lg px-4 py-3 h-32 focus:ring-2 focus:ring-indigo-500"
                            placeholder="I have 5 years of experience in full stack software development including web applications and mobile applications."></textarea>
                    </div>

                    {{-- District --}}
                    <div>
                        <label class="block text-sm mb-2">District</label>

                        <select name="district"
                            class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500">

                            <option value="">Select District</option>
                            <option>Abbottabad</option>
                            <option>Bajaur</option>
                            <option>Bannu</option>
                            <option>Battagram</option>
                            <option>Bunir</option>
                            <option>Charsadda</option>
                            <option>Chitral (Lower)</option>
                            <option>Chitral (Upper)</option>
                            <option>Dera Ismail Khan</option>
                            <option>Hangu</option>
                            <option>Haripur</option>
                            <option>Karak</option>
                            <option>Khyber</option>
                            <option>Kohat</option>
                            <option>Kohistan (Lower)</option>
                            <option>Kohistan (Upper)</option>
                            <option>Kolai Palas</option>
                            <option>Kurram</option>
                            <option>Lakki Marwat</option>
                            <option>Malakand</option>
                            <option>Mansehra</option>
                            <option>Mardan</option>
                            <option>Mohmand</option>
                            <option>North Waziristan</option>
                            <option>Nowshera</option>
                            <option>Orakzai</option>
                            <option>Peshawar</option>
                            <option>Shangla</option>
                            <option>South Waziristan (Lower)</option>
                            <option>South Waziristan (Upper)</option>
                            <option>Swabi</option>
                            <option>Swat</option>
                            <option>Tank</option>
                            <option>Torghar</option>

                        </select>
                    </div>
                    <div class="mt-6">
                        <label class="block text-sm mb-2">Address</label>
                        <textarea name="address"
                            class="w-full border border-slate-300 rounded-lg px-4 py-3 h-24 focus:ring-2 focus:ring-indigo-500"></textarea>
                    </div>

                </div>


                <!-- CERTIFICATIONS -->
                <div class="border-t pt-10">
                    <h2 class="text-xl font-semibold mb-6">Certifications</h2>

                    <select id="certDropdown"
                        class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500">

                        <option value="">Select Certification</option>
                        <option>Google Analytics</option>
                        <option>Google Ads</option>
                        <option>Meta Marketing</option>
                        <option>AWS Certification</option>
                        <option>Microsoft Azure</option>
                        <option>CompTIA A+</option>
                        <option>CompTIA Security+</option>
                        <option>CCNA</option>
                        <option>PMP</option>
                        <option>HubSpot Marketing</option>
                        <option>Adobe Certified</option>
                        <option>TTB</option>
                        <option>SDC</option>
                        <option value="Other">Other</option>

                    </select>

                    <input id="manualCert" type="text" placeholder="Enter certification and press Enter"
                        class="hidden mt-3 w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500">

                    <div id="certContainer" class="flex flex-wrap gap-2 mt-4"></div>

                </div>


                <!-- FILES -->
                <div class="border-t pt-10">
                    <h2 class="text-xl font-semibold mb-6">Upload Documents</h2>

                    <div class="grid md:grid-cols-2 gap-6">

                        <div>
                            <label class="block text-sm mb-2">Upload CV</label>
                            <input type="file" name="cv" class="w-full border border-slate-300 rounded-lg p-3">
                        </div>

                        <div>
                            <label class="block text-sm mb-2">Profile Image</label>
                            <input type="file" name="profile_photo" class="w-full border border-slate-300 rounded-lg p-3">
                        </div>

                    </div>
                </div>


                <div class="pt-8 border-t">
                    <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-4 rounded-xl font-semibold transition">
                        Submit Application
                    </button>
                </div>

            </form>
        </div>
    </section>


    <script>

        let selectedSkills = []
        const maxSkills = 3


        /* TRADE → SKILLS MAPPING */

        const tradeSkills = {

            "Tailoring": [
                "Tailoring",
                "Embroidery",
                "Clothing Design",
                "Alterations",
                "Pattern Making"
            ],

            "Beautician": [
                "Haircut",
                "Makeup",
                "Manicure",
                "Pedicure",
                "Facial",
                "Hair Styling"
            ],

            "Cooking": [
                "Cooking",
                "Baking",
                "Food Preparation",
                "Catering"
            ],

            "Digital": [
                "Web Development",
                "Graphic Design",
                "SEO",
                "Digital Marketing",
                "Video Editing",
                "Content Writing",
                "Social Media Management",
                "WordPress Development",
                "React Development",
                "Laravel Development"
            ]

        }



        /* TRADE SELECT */

        const tradeSelect = document.getElementById('tradeSelect')
        const skillDropdown = document.getElementById('skillsDropdown')
        const manualSkill = document.getElementById('manualSkill')


        if (tradeSelect) {

            tradeSelect.addEventListener('change', function () {

                let trade = this.value

                skillDropdown.innerHTML = '<option value="">Select Skill</option>'

                if (tradeSkills[trade]) {

                    tradeSkills[trade].forEach(skill => {

                        let opt = document.createElement('option')
                        opt.value = skill
                        opt.textContent = skill

                        skillDropdown.appendChild(opt)

                    })

                }

                let other = document.createElement('option')
                other.value = "Other"
                other.textContent = "Other"

                skillDropdown.appendChild(other)

            })

        }



        /* SKILLS */

        skillDropdown.addEventListener('change', function () {

            let value = this.value

            if (value === "Other") {
                manualSkill.classList.remove('hidden')
                return
            }

            manualSkill.classList.add('hidden')

            if (!value) return

            if (selectedSkills.length >= maxSkills) {
                alert("Maximum 3 skills allowed")
                return
            }

            if (selectedSkills.includes(value)) return

            selectedSkills.push(value)

            renderSkills()

            this.value = ""

        })



        manualSkill.addEventListener('keypress', function (e) {

            if (e.key === "Enter") {

                e.preventDefault()

                let value = this.value.trim()

                if (!value) return

                if (selectedSkills.length >= maxSkills) {
                    alert("Maximum 3 skills allowed")
                    return
                }

                selectedSkills.push(value)

                renderSkills()

                this.value = ""
                manualSkill.classList.add('hidden')
                skillDropdown.value = ""

            }

        })



        function renderSkills() {

            let container = document.getElementById('skillsContainer')

            container.innerHTML = ""

            selectedSkills.forEach(skill => {

                let tag = document.createElement('span')

                tag.className = "inline-flex items-center gap-2 bg-indigo-100 text-indigo-700 text-sm px-3 py-1 rounded-full"

                tag.innerHTML = `
                    ${skill}
                    <button type="button" onclick="removeSkill('${skill}')" class="font-bold">✕</button>
                    `

                container.appendChild(tag)

            })

            document.getElementById('skillsInput').value = selectedSkills.join(',')

        }



        function removeSkill(skill) {

            selectedSkills = selectedSkills.filter(s => s !== skill)

            renderSkills()

        }




        /* CERTIFICATIONS */

        function getYearOptions() {

            let currentYear = new Date().getFullYear()

            let years = ""

            for (let y = currentYear; y >= 1990; y--) {

                years += `<option value="${y}">${y}</option>`

            }

            return years

        }



        function addCertification(cert) {

            let container = document.getElementById('certContainer')

            let row = document.createElement('div')

            row.className = "flex items-center gap-3 mt-2"

            row.innerHTML = `

                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded">
                    ${cert}
                    </span>

                    <span class="text-sm">Year</span>

                    <select name="certification_year[]" class="border w-20 rounded px-2 py-1">
                    ${getYearOptions()}
                    </select>

                    <input type="hidden" name="certification_name[]" value="${cert}">

                    <button type="button" onclick="this.parentElement.remove()" class="text-red-600 font-bold">
                    ✕
                    </button>

                    `

            container.appendChild(row)

        }



        const certDropdown = document.getElementById('certDropdown')
        const manualCert = document.getElementById('manualCert')

        certDropdown.addEventListener('change', function () {

            let val = this.value

            if (val === "Other") {
                manualCert.classList.remove('hidden')
                return
            }

            manualCert.classList.add('hidden')

            if (!val) return

            addCertification(val)

            this.value = ""

        })


        manualCert.addEventListener('keypress', function (e) {

            if (e.key === "Enter") {

                e.preventDefault()

                let val = this.value.trim()

                if (val) {

                    addCertification(val)

                    this.value = ""
                    manualCert.classList.add('hidden')
                    certDropdown.value = ""

                }

            }

        })

    </script>
    @include('frontend.footer')

@endsection