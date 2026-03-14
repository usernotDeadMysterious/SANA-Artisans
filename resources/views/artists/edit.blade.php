<x-app-layout>
    <div class="max-w-4xl  py-2">

        <h1 class="text-2xl font-bold mb-6">Edit Artist</h1>

        @if ($errors->any())
            <div class="bg-red-200 p-4 mb-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('artists.update', $artist) }}" enctype="multipart/form-data" class="p-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-6">
                {{-- full name --}}
                <div>
                    <label>Full Name</label>
                    <input name="name" value="{{ old('name', $artist->name) }}" class="w-full border p-2 rounded">
                </div>
                {{-- contact --}}
                <div>
                    <label>Contact</label>
                    <input name="contact" value="{{ old('contact', $artist->contact) }}"
                        class="w-full border p-2 rounded">
                </div>
                {{-- Email --}}
                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email', $artist->email) }}"
                        class="w-full border p-2 rounded">
                </div>
                {{-- Age --}}
                <div>
                    <label>Age</label>
                    <input type="number" name="age" value="{{ old('age', $artist->age) }}"
                        class="w-full border p-2 rounded">
                </div>
                {{-- Gender --}}
                <div>
                    <label>Gender</label>
                    <select name="gender" class="w-full border p-2 rounded">
                        <option value="male" {{ $artist->gender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $artist->gender == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ $artist->gender == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                {{-- Education --}}
                <div>
                    <label>Education</label>
                    <input name="qualification" value="{{ old('qualification', $artist->qualification) }}"
                        class="w-full border p-2 rounded">
                </div>

                {{-- Trade --}}
                <div>
                    <label class="block text-sm mb-2">Trade</label>

                    <select id="tradeSelect" name="trade"
                        class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500">

                        <option value="">Select Trade</option>

                        <option value="Tailoring" {{ $artist->trade == 'Tailoring' ? 'selected' : '' }}>Tailoring</option>

                        <option value="Beautician" {{ $artist->trade == 'Beautician' ? 'selected' : '' }}>Beautician
                        </option>

                        <option value="Cooking" {{ $artist->trade == 'Cooking' ? 'selected' : '' }}>Cooking</option>

                        <option value="Digital Skills" {{ $artist->trade == 'Digital Skills' ? 'selected' : '' }}>Digital
                            Skills
                        </option>

                    </select>
                </div>
                <!-- SKILLS -->
                <div>
                    <label class="block text-sm mb-2">Skills (max 3)</label>

                    <select id="skillsDropdown"
                        class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500 ">



                    </select>

                    <input id="manualSkill" type="text" placeholder="Enter custom skill and press Enter"
                        class="hidden mt-3 w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500">

                    <div id="skillsContainer" class="flex flex-wrap gap-2 mt-3"></div>

                    <input type="hidden" name="specialization" id="skillsInput">

                </div>



                {{-- CERTIFICATIONS --}}
                <div class="col-span-2">

                    <label class="font-semibold">Certifications</label>

                    <select id="certDropdown" class="w-full border p-2">
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
                        class="hidden w-full border p-2 mt-2">

                    <div id="certContainer" class="mt-3 space-y-2"></div>

                </div>
                {{-- Approval status --}}
                <div>
                    <label>Approval Status</label>

                    <select name="approval_status" class="w-full border p-2 rounded">

                        <option value="pending" {{ $artist->approval_status == 'pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="approved" {{ $artist->approval_status == 'approved' ? 'selected' : '' }}>
                            Approved
                        </option>

                        <option value="rejected" {{ $artist->approval_status == 'rejected' ? 'selected' : '' }}>
                            Rejected
                        </option>

                    </select>
                </div>
                {{-- Current status --}}
                <div>
                    <label>Current Status</label>

                    <select name="current_status" class="w-full border p-2 rounded">

                        <option value="student" {{ $artist->current_status == 'student' ? 'selected' : '' }}>Student
                        </option>

                        <option value="own_business" {{ $artist->current_status == 'own_business' ? 'selected' : '' }}>Own
                            Business</option>

                        <option value="employee" {{ $artist->current_status == 'employee' ? 'selected' : '' }}>Employee
                        </option>

                        <option value="unemployed" {{ $artist->current_status == 'unemployed' ? 'selected' : '' }}>
                            Unemployed
                        </option>

                        <option value="other" {{ $artist->current_status == 'other' ? 'selected' : '' }}>Other</option>

                    </select>

                </div>
                {{-- Experience --}}

                <div class="col-span-2">

                    <label>Experience</label>

                    <textarea name="experience"
                        class="w-full border p-2 rounded">{{ old('experience', $artist->experience) }}</textarea>

                </div>
                {{-- District --}}
                <div>
                    <label class="block text-sm mb-2">District</label>

                    <select name="district"
                        class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-500">

                        <option value="">Select District</option>
                        <option value="Abbottabad" {{ $artist->district == 'Abbottabad' ? 'selected' : '' }}>Abbottabad
                        </option>

                        <option value="Bajaur" {{ $artist->district == 'Bajaur' ? 'selected' : '' }}>Bajaur</option>

                        <option value="Bannu" {{ $artist->district == 'Bannu' ? 'selected' : '' }}>Bannu</option>

                        <option value="Battagram" {{ $artist->district == 'Battagram' ? 'selected' : '' }}>Battagram
                        </option>

                        <option value="Bunir" {{ $artist->district == 'Bunir' ? 'selected' : '' }}>Bunir</option>

                        <option value="Charsadda" {{ $artist->district == 'Charsadda' ? 'selected' : '' }}>Charsadda
                        </option>

                        <option value="Chitral (Lower)" {{ $artist->district == 'Chitral (Lower)' ? 'selected' : '' }}>
                            Chitral (Lower)</option>

                        <option value="Chitral (Upper)" {{ $artist->district == 'Chitral (Upper)' ? 'selected' : '' }}>
                            Chitral (Upper)</option>

                        <option value="Dera Ismail Khan" {{ $artist->district == 'Dera Ismail Khan' ? 'selected' : '' }}>
                            Dera Ismail Khan</option>

                        <option value="Hangu" {{ $artist->district == 'Hangu' ? 'selected' : '' }}>Hangu</option>

                        <option value="Haripur" {{ $artist->district == 'Haripur' ? 'selected' : '' }}>Haripur</option>

                        <option value="Karak" {{ $artist->district == 'Karak' ? 'selected' : '' }}>Karak</option>

                        <option value="Khyber" {{ $artist->district == 'Khyber' ? 'selected' : '' }}>Khyber</option>

                        <option value="Kohat" {{ $artist->district == 'Kohat' ? 'selected' : '' }}>Kohat</option>

                        <option value="Kohistan (Lower)" {{ $artist->district == 'Kohistan (Lower)' ? 'selected' : '' }}>
                            Kohistan (Lower)</option>

                        <option value="Kohistan (Upper)" {{ $artist->district == 'Kohistan (Upper)' ? 'selected' : '' }}>
                            Kohistan (Upper)</option>

                        <option value="Kolai Palas" {{ $artist->district == 'Kolai Palas' ? 'selected' : '' }}>Kolai Palas
                        </option>

                        <option value="Kurram" {{ $artist->district == 'Kurram' ? 'selected' : '' }}>Kurram</option>

                        <option value="Lakki Marwat" {{ $artist->district == 'Lakki Marwat' ? 'selected' : '' }}>Lakki
                            Marwat</option>

                        <option value="Malakand" {{ $artist->district == 'Malakand' ? 'selected' : '' }}>Malakand</option>

                        <option value="Mansehra" {{ $artist->district == 'Mansehra' ? 'selected' : '' }}>Mansehra</option>

                        <option value="Mardan" {{ $artist->district == 'Mardan' ? 'selected' : '' }}>Mardan</option>

                        <option value="Mohmand" {{ $artist->district == 'Mohmand' ? 'selected' : '' }}>Mohmand</option>

                        <option value="North Waziristan" {{ $artist->district == 'North Waziristan' ? 'selected' : '' }}>
                            North Waziristan</option>

                        <option value="Nowshera" {{ $artist->district == 'Nowshera' ? 'selected' : '' }}>Nowshera</option>

                        <option value="Orakzai" {{ $artist->district == 'Orakzai' ? 'selected' : '' }}>Orakzai</option>

                        <option value="Peshawar" {{ $artist->district == 'Peshawar' ? 'selected' : '' }}>Peshawar</option>

                        <option value="Shangla" {{ $artist->district == 'Shangla' ? 'selected' : '' }}>Shangla</option>

                        <option value="South Waziristan (Lower)" {{ $artist->district == 'South Waziristan (Lower)' ? 'selected' : '' }}>South Waziristan (Lower)</option>

                        <option value="South Waziristan (Upper)" {{ $artist->district == 'South Waziristan (Upper)' ? 'selected' : '' }}>South Waziristan (Upper)</option>

                        <option value="Swabi" {{ $artist->district == 'Swabi' ? 'selected' : '' }}>Swabi</option>

                        <option value="Swat" {{ $artist->district == 'Swat' ? 'selected' : '' }}>Swat</option>

                        <option value="Tank" {{ $artist->district == 'Tank' ? 'selected' : '' }}>Tank</option>

                        <option value="Torghar" {{ $artist->district == 'Torghar' ? 'selected' : '' }}>Torghar</option>



                    </select>
                </div>
                {{-- Address --}}
                <div class="col-span-2">

                    <label>Address</label>

                    <textarea name="address"
                        class="w-full border p-2 rounded">{{ old('address', $artist->address) }}</textarea>

                </div>

            </div>


            <div class="flex flex-row w-full mt-3">

                <div class="flex gap-2 items-center">

                    <label>Replace CV</label>

                    <input type="file" name="cv" class="w-full">

                </div>

                <div class="flex gap-2 items-center">

                    <label>Replace Profile Image</label>

                    <input type="file" name="profile_photo" class="w-full">

                </div>

            </div>


            <div class="mt-6">

                <button class="bg-blue-600 text-white px-6 py-2 rounded">

                    Update Artist

                </button>

            </div>

        </form>

    </div>


    <script>


        let selectedSkills = {!! json_encode(explode(',', $artist->specialization)) !!}
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

        renderSkills()

        function removeSkill(skill) {

            selectedSkills = selectedSkills.filter(s => s !== skill)

            renderSkills()

        }



        /* EXISTING CERTIFICATIONS */

        let existingCerts = @json($artist->certifications);

        function getYearOptions(selectedYear = null) {

            let options = ""

            let currentYear = new Date().getFullYear()

            for (let y = currentYear; y >= 1990; y--) {

                let selected = selectedYear == y ? "selected" : ""

                options += `<option value="${y}" ${selected}>${y}</option>`

            }

            return options
        }

        function addCertification(cert, year = null) {

            let container = document.getElementById('certContainer')

            let row = document.createElement('div')

            row.className = "flex gap-3 items-center"

            row.innerHTML = `

<span class="bg-yellow-100 px-3 py-1 rounded">${cert}</span>

<span>year</span>

<select name="certification_year[]" class="border p-1 rounded w-24">
${getYearOptions(year)}
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


        /* LOAD EXISTING CERTIFICATIONS */

        existingCerts.forEach(cert => {

            addCertification(cert.certification_name, cert.certification_year)

        })


        /* DROPDOWN */

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


        /* MANUAL CERT */

        manualCert.addEventListener('keypress', function (e) {

            if (e.key === "Enter") {

                e.preventDefault()

                let val = this.value.trim()

                if (!val) return

                addCertification(val)

                this.value = ""

                manualCert.classList.add('hidden')

            }

        })
    </script>

</x-app-layout>