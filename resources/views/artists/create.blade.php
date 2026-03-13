<x-app-layout>

    <div class="max-w-5xl mx-auto py-10 px-6">

        <div class="bg-white shadow-xl rounded-2xl p-8">

            <h1 class="text-3xl font-bold mb-8">
                Create Artist
            </h1>

            <form method="POST" action="{{ route('artists.store') }}" enctype="multipart/form-data">
                @csrf


                <!-- PERSONAL INFO -->
                <h2 class="text-lg font-semibold mb-4 border-b pb-2">
                    Personal Information
                </h2>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>
                        <label class="text-sm font-medium">Full Name</label>
                        <input name="name" value="{{ old('name') }}"
                            class="w-full border rounded-lg p-3 mt-1 focus:ring-2 focus:ring-blue-400">
                    </div>

                    <div>
                        <label class="text-sm font-medium">Contact</label>
                        <input type="number" name="contact" value="{{ old('contact') }}"
                            class="w-full border rounded-lg p-3 mt-1 focus:ring-2 focus:ring-blue-400">
                    </div>

                    <div>
                        <label class="text-sm font-medium">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full border rounded-lg p-3 mt-1 focus:ring-2 focus:ring-blue-400">
                    </div>

                    <div>
                        <label class="text-sm font-medium">Age</label>
                        <input type="number" name="age" value="{{ old('age') }}"
                            class="w-full border rounded-lg p-3 mt-1 focus:ring-2 focus:ring-blue-400">
                    </div>

                    <div>
                        <label class="text-sm font-medium">Gender</label>
                        <select name="gender"
                            class="w-full border rounded-lg p-3 mt-1 focus:ring-2 focus:ring-blue-400">

                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>

                        </select>
                    </div>

                    <div>
                        <label class="text-sm font-medium">Education</label>
                        <input name="qualification" value="{{ old('qualification') }}"
                            class="w-full border rounded-lg p-3 mt-1 focus:ring-2 focus:ring-blue-400">
                    </div>

                </div>


                <!-- SKILLS -->
                <h2 class="text-lg font-semibold mt-10 mb-4 border-b pb-2">
                    Skills & Trade
                </h2>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>
                        <label class="text-sm font-medium">Trade</label>

                        <select id="tradeSelect" name="trade" class="w-full border rounded-lg p-3 mt-1">

                            <option value="">Select Trade</option>
                            <option>Tailoring</option>
                            <option>Beautification</option>
                            <option>Cooking</option>
                            <option>Digital Skills</option>

                        </select>

                    </div>


                    <div>
                        <label class="text-sm font-medium">Skills (max 3)</label>

                        <select id="skillsDropdown" class="w-full border rounded-lg p-3 mt-1">

                            <option value="">Select Skill</option>

                        </select>

                        <input id="manualSkill" type="text" placeholder="Enter skill and press Enter"
                            class="hidden w-full border rounded-lg p-3 mt-2">

                        <div id="skillsContainer" class="mt-3 flex flex-wrap gap-2"></div>

                        <input type="hidden" name="specialization" id="skillsInput">

                    </div>

                </div>


                <!-- LOCATION -->
                <h2 class="text-lg font-semibold mt-10 mb-4 border-b pb-2">
                    Location & Status
                </h2>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>
                        <label class="text-sm font-medium">District</label>

                        <select name="district" class="w-full border rounded-lg p-3 mt-1">

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


                    <div>
                        <label class="text-sm font-medium">Current Status</label>

                        <select name="current_status" class="w-full border rounded-lg p-3 mt-1">

                            <option value="student">Student</option>
                            <option value="own_business">Own Business</option>
                            <option value="employee">Employee</option>
                            <option value="unemployed">Unemployed</option>

                        </select>

                    </div>

                </div>


                <!-- CERTIFICATIONS -->
                <h2 class="text-lg font-semibold mt-10 mb-4 border-b pb-2">
                    Certifications
                </h2>

                <div>

                    <select id="certDropdown" class="w-full border rounded-lg p-3">

                        <option value="">Select Certification</option>

                        <option>PMP</option>
                        <option>HubSpot Marketing</option>
                        <option>Google Analytics</option>
                        <option>Google Ads</option>
                        <option>Meta Marketing</option>
                        <option>Microsoft Azure</option>
                        <option>CCNA</option>
                        <option>CompTIA Security+</option>
                        <option>TTB</option>
                        <option>SDC</option>
                        <option value="Other">Other</option>

                    </select>

                    <input id="manualCert" type="text" placeholder="Enter certification"
                        class="hidden w-full border rounded-lg p-3 mt-3">

                    <div id="certContainer" class="mt-3 space-y-2"></div>

                </div>


                <!-- EXPERIENCE -->
                <h2 class="text-lg font-semibold mt-10 mb-4 border-b pb-2">
                    Professional Details
                </h2>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>
                        <label class="text-sm font-medium">Experience</label>
                        <textarea name="experience" class="w-full border rounded-lg p-3 mt-1"></textarea>
                    </div>

                    <div>
                        <label class="text-sm font-medium">Address</label>
                        <textarea name="address" class="w-full border rounded-lg p-3 mt-1"></textarea>
                    </div>

                </div>


                <!-- FILE UPLOAD -->
                <h2 class="text-lg font-semibold mt-10 mb-4 border-b pb-2">
                    Documents
                </h2>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>
                        <label class="text-sm font-medium">Upload CV</label>
                        <input type="file" name="cv" class="w-full border rounded-lg p-3 mt-1 bg-gray-50">
                    </div>

                    <div>
                        <label class="text-sm font-medium">Profile Image</label>
                        <input type="file" name="profile_photo" class="w-full border rounded-lg p-3 mt-1 bg-gray-50">
                    </div>

                </div>


                <!-- SUBMIT -->
                <div class="mt-10 text-right">

                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold shadow">

                        Create Artist

                    </button>

                </div>


            </form>

        </div>

    </div>
    <script>

        let selectedSkills = []
        const maxSkills = 3

        const tradeSkills = {

            "Tailoring": [
                "Tailoring",
                "Embroidery",
                "Clothing Design",
                "Alterations",
                "Pattern Making"
            ],

            "Beautification": [
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
                "Catering",
                "Kitchen Management"
            ],

            "Digital Skills": [
                "Web Development",
                "Graphic Design",
                "Digital Marketing",
                "SEO",
                "Video Editing",
                "Content Writing",
                "Social Media Management",
                "Photography",
                "WordPress Development",
                "React Development",
                "Laravel Development"
            ]

        }


        document.getElementById('tradeSelect').addEventListener('change', function () {

            let trade = this.value
            let dropdown = document.getElementById('skillsDropdown')

            dropdown.innerHTML = '<option value="">Select Skill</option>'

            if (tradeSkills[trade]) {

                tradeSkills[trade].forEach(skill => {

                    let opt = document.createElement('option')
                    opt.value = skill
                    opt.textContent = skill

                    dropdown.appendChild(opt)

                })

            }

            let other = document.createElement('option')
            other.value = "Other"
            other.textContent = "Other"

            dropdown.appendChild(other)

        })



        const skillDropdown = document.getElementById('skillsDropdown')
        const manualSkill = document.getElementById('manualSkill')


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

                selectedSkills.push(value)

                renderSkills()

                this.value = ""
                manualSkill.classList.add('hidden')

            }

        })


        function renderSkills() {

            let container = document.getElementById('skillsContainer')

            container.innerHTML = ""

            selectedSkills.forEach(skill => {

                let tag = document.createElement('span')

                tag.className = "inline-flex items-center gap-2 bg-yellow-100 text-yellow-800 text-sm px-3 py-1 rounded-full mr-2 mb-2"

                tag.innerHTML = `${skill} <button type="button" onclick="removeSkill('${skill}')">✕</button>
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

            let yearSelect = ""

            let currentYear = new Date().getFullYear()

            for (let y = currentYear; y >= 1990; y--) {

                yearSelect += `<option value="${y}">${y}</option>`

            }

            return yearSelect

        }


        function addCertification(cert) {

            let container = document.getElementById('certContainer')

            let id = Date.now()

            let row = document.createElement('div')

            row.className = "flex gap-3 items-center mt-2"

            row.innerHTML = `

<span class="bg-yellow-100 px-3 py-1 rounded">${cert}</span> <span> year of certification </span>

<select name="certification_year[]" class="border p-1 rounded w-20">
${getYearOptions()}
</select>

<input type="hidden" name="certification_name[]" value="${cert}">

<button type="button"
onclick="this.parentElement.remove()"
class="text-red-600 font-bold">
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

                }

            }

        })

    </script>

</x-app-layout>