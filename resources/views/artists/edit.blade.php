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


                {{-- SKILLS --}}
                <div>
                    <label>Skills (max 3)</label>

                    <select id="skillsDropdown" class="w-full border p-2">
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

                    <input id="manualSkill" type="text" placeholder="Enter skill and press Enter"
                        class="hidden w-full border p-2 mt-2">

                    <div id="skillsContainer" class="mt-2"></div>

                    <input type="hidden" name="specialization" id="skillsInput">

                </div>


                {{-- CERTIFICATIONS --}}
                <div>

                    <label>Certifications</label>

                    <select id="certDropdown" class="w-full border p-2">
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
                        class="hidden w-full border p-2 mt-2">

                    <div id="certContainer" class="mt-2"></div>

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

        const skillDropdown = document.getElementById('skillsDropdown')

        const manualSkill = document.getElementById('manualSkill')


        function renderSkills() {

            let container = document.getElementById('skillsContainer')

            container.innerHTML = ""

            selectedSkills.forEach(skill => {

                let tag = document.createElement('span')

                tag.className = "inline-flex items-center gap-2 bg-yellow-100 text-yellow-800 text-sm px-3 py-1 rounded-full mr-2 mb-2"

                tag.innerHTML = `
${skill}
<button type="button" class="text-yellow-700 hover:text-red-600 font-bold"
onclick="removeSkill('${skill}')">✕</button>
`

                container.appendChild(tag)

            })

            document.getElementById('skillsInput').value = selectedSkills.join(',')

        }

        renderSkills()

        skillDropdown.addEventListener('change', function () {

            let value = this.value

            if (value === "Other") { manualSkill.classList.remove('hidden'); return }

            manualSkill.classList.add('hidden')

            if (!value) return

            if (selectedSkills.length >= maxSkills) { alert("Maximum 3 skills allowed"); return }

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

                if (selectedSkills.length >= maxSkills) { alert("Maximum 3 skills allowed"); return }

                selectedSkills.push(value)

                renderSkills()

                this.value = ""

                manualSkill.classList.add('hidden')

                skillDropdown.value = ""

            }

        })


        function removeSkill(skill) {

            selectedSkills = selectedSkills.filter(s => s !== skill)

            renderSkills()

        }



        let existingCerts = {!! json_encode($artist->certification ?? []) !!}

        function addCertification(cert) {

            let container = document.getElementById('certContainer')

            let tag = document.createElement('span')

            tag.className = "inline-flex items-center gap-2 bg-yellow-100 text-yellow-800 text-sm px-3 py-1 rounded-full mr-2 mb-2"

            tag.innerHTML = `
${cert}
<button type="button" class="text-yellow-700 hover:text-red-600 font-bold"
onclick="this.parentElement.remove()">✕</button>
<input type="hidden" name="certification[]" value="${cert}">
`

            container.appendChild(tag)

        }

        existingCerts.forEach(c => addCertification(c))

        const certDropdown = document.getElementById('certDropdown')

        const manualCert = document.getElementById('manualCert')

        certDropdown.addEventListener('change', function () {

            let val = this.value

            if (val === "Other") { manualCert.classList.remove('hidden'); return }

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

</x-app-layout>