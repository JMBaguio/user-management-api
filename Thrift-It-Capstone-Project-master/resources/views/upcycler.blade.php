<x-app-layout>
   

   <!-- Cinematic Hero Section -->
  
<div class="relative bg-[#F4F2ED] overflow-hidden">
    <!-- Animated Gradient Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#F4F2ED] via-[#F8F6F0] to-[#ECE8DF] animate-gradient-x"></div>
    
    <!-- Floating Particles Background -->
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-[#B59F84] rounded-full animate-float-1"></div>
        <div class="absolute top-1/3 right-1/3 w-3 h-3 bg-[#8A7B66] rounded-full animate-float-2"></div>
        <div class="absolute bottom-1/4 left-1/3 w-2 h-2 bg-[#634600] rounded-full animate-float-3"></div>
        <div class="absolute top-2/3 right-1/4 w-4 h-4 bg-[#B59F84] rounded-full animate-float-4"></div>
        <div class="absolute bottom-1/3 left-1/5 w-3 h-3 bg-[#8A7B66] rounded-full animate-float-5"></div>
        <div class="absolute top-1/5 right-1/5 w-2 h-2 bg-[#634600] rounded-full animate-float-6"></div>
    </div>

    <!-- Animated Border Glow -->
    <div class="absolute inset-0 border-8 border-transparent animate-border-glow rounded-lg"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28">
        <div class="text-center">
            <!-- Animated Main Icon -->
            <div class="mb-8 animate-float">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-[#634600] to-[#8A7B66] rounded-full shadow-2xl transform hover:scale-110 transition-all duration-500 hover:rotate-12 border-4 border-white/20">
                    <svg class="w-12 h-12 text-[#F4F2ED] animate-pulse-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                </div>
            </div>
            
            <!-- Animated Title -->
            <h1 class="text-5xl md:text-7xl font-bold text-[#634600] mb-8 tracking-tight animate-fade-in-up">
                Welcome to Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#B59F84] to-[#634600] animate-text-glow">Creative</span> Hub
            </h1>
            
            <!-- Animated Description -->
            <p class="text-xl md:text-2xl text-[#603E14] mb-12 max-w-4xl mx-auto leading-relaxed animate-fade-in-up delay-200">
                Where discarded materials find new life as extraordinary creations. 
                Your vision transforms trash into treasure, one sustainable masterpiece at a time.
            </p>
            
            <!-- Enhanced Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16 max-w-3xl mx-auto">
                <div class="group bg-[#F4F2ED]/90 backdrop-blur-md rounded-2xl p-8 border-2 border-[#B59F84]/30 shadow-2xl transform hover:scale-105 hover:-translate-y-2 transition-all duration-500 animate-fade-in-up delay-300 hover:shadow-2xl hover:border-[#B59F84]/60">
                    <div class="text-3xl font-bold text-[#634600] mb-4 group-hover:scale-110 transition-transform duration-300">∞</div>
                    <div class="text-[#603E14] font-semibold text-lg">Unlimited Creativity</div>
                    <div class="mt-2 text-sm text-[#8A7B66] opacity-0 group-hover:opacity-100 transition-opacity duration-300">Endless possibilities await</div>
                </div>
                <div class="group bg-[#F4F2ED]/90 backdrop-blur-md rounded-2xl p-8 border-2 border-[#B59F84]/30 shadow-2xl transform hover:scale-105 hover:-translate-y-2 transition-all duration-500 animate-fade-in-up delay-400 hover:shadow-2xl hover:border-[#B59F84]/60">
                    <div class="text-3xl font-bold text-[#634600] mb-4 group-hover:scale-110 transition-transform duration-300">♻️</div>
                    <div class="text-[#603E14] font-semibold text-lg">Eco-Friendly</div>
                    <div class="mt-2 text-sm text-[#8A7B66] opacity-0 group-hover:opacity-100 transition-opacity duration-300">Sustainable by design</div>
                </div>
                <div class="group bg-[#F4F2ED]/90 backdrop-blur-md rounded-2xl p-8 border-2 border-[#B59F84]/30 shadow-2xl transform hover:scale-105 hover:-translate-y-2 transition-all duration-500 animate-fade-in-up delay-500 hover:shadow-2xl hover:border-[#B59F84]/60">
                    <div class="text-3xl font-bold text-[#634600] mb-4 group-hover:scale-110 transition-transform duration-300">⚡</div>
                    <div class="text-[#603E14] font-semibold text-lg">Fast Results</div>
                    <div class="mt-2 text-sm text-[#8A7B66] opacity-0 group-hover:opacity-100 transition-opacity duration-300">Quick turnaround time</div>
                </div>
            </div>

            <!-- CTA Button -->
            <div class="mt-16 animate-fade-in-up delay-700">
                <button class="group bg-gradient-to-r from-[#634600] to-[#B59F84] text-white px-12 py-4 rounded-full text-lg font-semibold shadow-2xl transform hover:scale-105 hover:shadow-3xl transition-all duration-500 border-2 border-white/20 hover:border-white/40">
                    <span class="flex items-center space-x-3">
                        <span>Manage Appointments</span>
                        <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <div class="w-6 h-10 border-2 border-[#634600] rounded-full flex justify-center">
            <div class="w-1 h-3 bg-[#634600] rounded-full mt-2 animate-scroll"></div>
        </div>
    </div>
</div>
    <!-- Animated background elements -->
    <div class="absolute  top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
        <div class="absolute -top-4 -left-4 w-8 h-8 bg-[#B59F84] rounded-full opacity-30 animate-pulse"></div>
        <div class="absolute top-1/4 right-10 w-6 h-6 bg-[#8A7B66] rounded-full opacity-40 animate-bounce"></div>
        <div class="absolute bottom-20 left-20 w-4 h-4 bg-[#634600] rounded-full opacity-30 animate-ping"></div>
        <div class="absolute top-1/2 left-1/4 w-3 h-3 bg-[#603E14] rounded-full opacity-50 animate-pulse"></div>
        <div class="absolute bottom-10 right-20 w-5 h-5 bg-[#B59F84] rounded-full opacity-25 animate-bounce delay-300"></div>
    </div>
</div>

   <div class="py-16 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-4 h-4 bg-green-400 rounded-full animate-float-1"></div>
        <div class="absolute top-1/4 right-20 w-6 h-6 bg-blue-400 rounded-full animate-float-2"></div>
        <div class="absolute bottom-1/3 left-1/4 w-3 h-3 bg-purple-400 rounded-full animate-float-3"></div>
        <div class="absolute top-2/3 right-1/3 w-5 h-5 bg-orange-400 rounded-full animate-float-4"></div>
        <div class="absolute bottom-20 left-1/2 w-4 h-4 bg-teal-400 rounded-full animate-float-5"></div>
    </div>

    <!-- Gradient Orbs -->
    <!-- Gradient Orbs -->
<div class="absolute -top-20 -right-20 w-80 h-80 bg-gradient-to-r from-[#B59F84] to-[#9C8770] rounded-full opacity-10 blur-3xl animate-pulse-slow"></div>
<div class="absolute -bottom-20 -left-20 w-80 h-80 bg-gradient-to-r from-[#E1D5B6] to-[#D5C39A] rounded-full opacity-10 blur-3xl animate-pulse-slow delay-1000"></div>
    <div class="max-w-7xl  mx-auto sm:px-6 lg:px-8 relative z-10">
        <!-- Enhanced Description Section with Icons -->
        <div class="mb-16">
    <div class="text-center mb-12 animate-fade-in-up">
        <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-[#B59F84] to-[#9C8770] rounded-full shadow-2xl mb-6 animate-float">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
            </svg>
        </div>
        <h2 class="text-4xl md:text-5xl font-bold text-gray-800 dark:text-white mb-6 bg-gradient-to-r from-[#8A7560] to-[#B59F84] dark:from-white dark:to-[#B59F84] bg-clip-text text-transparent">
            Your Upcycling Journey Starts Here
        </h2>
        <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
            Discover powerful tools and resources to transform ordinary materials into extraordinary creations. 
            Join a community of eco-innovators making a difference.
        </p>
    </div>

    <!-- Enhanced Feature Grid with Cinematic Animations -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
        <!-- Feature 1 -->
        <div class="text-center group animate-fade-in-up delay-100">
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-[#B59F84] to-[#9C8770] rounded-full blur-lg opacity-75 group-hover:opacity-100 transition-opacity duration-500 animate-pulse"></div>
                <div class="relative w-20 h-20 bg-[#F8F4EC] dark:bg-[#8A7560] rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 group-hover:rotate-12 transition-all duration-500 shadow-2xl">
                    <svg class="w-10 h-10 text-[#B59F84] dark:text-[#F1E9D2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 group-hover:text-[#B59F84] dark:group-hover:text-[#D5C39A] transition-colors duration-300">Sustainable Impact</h3>
            <p class="text-gray-600 dark:text-gray-400 leading-relaxed group-hover:text-gray-700 dark:group-hover:text-gray-300 transition-colors duration-300">
                Track your environmental contribution and see how your creations reduce waste.
            </p>
            <div class="mt-4 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all duration-500">
                <span class="text-sm text-[#B59F84] font-semibold">♻️ Reduce • Reuse • Revolutionize</span>
            </div>
        </div>

        <!-- Feature 2 -->
        <div class="text-center group animate-fade-in-up delay-200">
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-[#9C8770] to-[#8A7560] rounded-full blur-lg opacity-75 group-hover:opacity-100 transition-opacity duration-500 animate-pulse"></div>
                <div class="relative w-20 h-20 bg-[#F8F4EC] dark:bg-[#8A7560] rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 group-hover:-rotate-12 transition-all duration-500 shadow-2xl">
                    <svg class="w-10 h-10 text-[#9C8770] dark:text-[#F1E9D2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 group-hover:text-[#9C8770] dark:group-hover:text-[#D5C39A] transition-colors duration-300">Creative Community</h3>
            <p class="text-gray-600 dark:text-gray-400 leading-relaxed group-hover:text-gray-700 dark:group-hover:text-gray-300 transition-colors duration-300">
                Connect with fellow upcyclers, share ideas, and get inspired by innovative projects.
            </p>
            <div class="mt-4 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all duration-500">
                <span class="text-sm text-[#9C8770] font-semibold">👥 Connect • Share • Grow Together</span>
            </div>
        </div>

        <!-- Feature 3 -->
        <div class="text-center group animate-fade-in-up delay-300">
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-[#8A7560] to-[#6B5B48] rounded-full blur-lg opacity-75 group-hover:opacity-100 transition-opacity duration-500 animate-pulse"></div>
                <div class="relative w-20 h-20 bg-[#F8F4EC] dark:bg-[#6B5B48] rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 group-hover:rotate-12 transition-all duration-500 shadow-2xl">
                    <svg class="w-10 h-10 text-[#8A7560] dark:text-[#F1E9D2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 group-hover:text-[#8A7560] dark:group-hover:text-[#D5C39A] transition-colors duration-300">Smart Tools</h3>
            <p class="text-gray-600 dark:text-gray-400 leading-relaxed group-hover:text-gray-700 dark:group-hover:text-gray-300 transition-colors duration-300">
                Access advanced tools for material matching, project planning, and design optimization.
            </p>
            <div class="mt-4 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all duration-500">
                <span class="text-sm text-[#8A7560] font-semibold">⚡ Smart • Efficient • Innovative</span>
            </div>
        </div>

        <!-- Feature 4 -->
        <div class="text-center group animate-fade-in-up delay-400">
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-[#E1D5B6] to-[#D5C39A] rounded-full blur-lg opacity-75 group-hover:opacity-100 transition-opacity duration-500 animate-pulse"></div>
                <div class="relative w-20 h-20 bg-[#F8F4EC] dark:bg-[#D5C39A] rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 group-hover:-rotate-12 transition-all duration-500 shadow-2xl">
                    <svg class="w-10 h-10 text-[#B59F84] dark:text-[#8A7560]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4 group-hover:text-[#B59F84] dark:group-hover:text-[#8A7560] transition-colors duration-300">Progress Tracking</h3>
            <p class="text-gray-600 dark:text-gray-400 leading-relaxed group-hover:text-gray-700 dark:group-hover:text-gray-300 transition-colors duration-300">
                Monitor your projects, set milestones, and celebrate your upcycling achievements.
            </p>
            <div class="mt-4 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all duration-500">
                <span class="text-sm text-[#B59F84] font-semibold">📈 Track • Achieve • Celebrate</span>
            </div>
        </div>
    </div>

            <!-- Enhanced Cinematic Call to Action Section -->
<div class="relative bg-gradient-to-r from-[#F8F4EC] via-[#F1E9D2] to-[#E9DFC7] rounded-3xl p-12 text-center shadow-2xl transform hover:scale-[1.02] transition-all duration-700 animate-fade-in-up delay-500 overflow-hidden">
    <!-- Animated Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-32 h-32 bg-[#8A7560] rounded-full animate-float-1"></div>
        <div class="absolute bottom-0 right-0 w-24 h-24 bg-[#8A7560] rounded-full animate-float-2"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-[#8A7560] rounded-full animate-float-3"></div>
    </div>
    
    <!-- Shine Effect -->
    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -skew-x-12 animate-shine"></div>

    <div class="max-w-2xl mx-auto relative z-10">
        <div class="w-24 h-24 bg-gradient-to-r from-[#B59F84] to-[#9C8770] rounded-full flex items-center justify-center mx-auto mb-8 shadow-2xl animate-pulse-slow">
            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
        </div>
        <h3 class="text-3xl md:text-4xl font-bold mb-6 text-gray-800">Ready to Create Something Amazing?</h3>
        <p class="text-gray-700 text-xl mb-8 leading-relaxed">
            Join thousands of upcyclers turning waste into wonder. Start your first project today and make a positive impact on our planet.
        </p>
    </div>
</div>
</div>



        <!-- Enhanced Main Dashboard Content -->
<div class="bg-[#F4F2ED] dark:bg-[#F4F2ED] overflow-hidden shadow-2xl sm:rounded-2xl transform hover:shadow-3xl transition-all duration-500 animate-fade-in-up delay-600">
    <div class="p-8 text-gray-900 dark:text-gray-100">
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center space-x-4">
                <div class="p-3 bg-gradient-to-r from-[#B59F84] to-[#9C8770] rounded-xl shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 dark:text-white">Dashboard Overview</h3>
            </div>
            <span class="px-4 py-2 bg-gradient-to-r from-[#B59F84] to-[#9C8770] text-white rounded-full text-sm font-bold shadow-lg animate-pulse">
                🌟 Active Upcycler
            </span>
        </div>
        
        <div class="bg-white/80 dark:bg-white/80 rounded-xl p-6 mb-6 border border-[#E9DFC7]">
            <p class="text-2xl font-semibold text-gray-800 dark:text-gray-800 mb-4">
                {{ __("You're logged in!") }}
            </p>
            <p class="text-lg text-gray-700 dark:text-gray-700">
                Ready to transform ordinary materials into extraordinary creations? Start your next upcycling project today!
            </p>
        </div>
    </div>
</div>
    </div>
</div>


    <style>
    /* Custom Animations */
    @keyframes gradient-x {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    @keyframes float-1 {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        33% { transform: translate(30px, -50px) rotate(120deg); }
        66% { transform: translate(-20px, 20px) rotate(240deg); }
    }
    
    @keyframes float-2 {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        33% { transform: translate(-40px, -30px) rotate(-120deg); }
        66% { transform: translate(20px, 40px) rotate(-240deg); }
    }
    
    @keyframes float-3 {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        33% { transform: translate(50px, 20px) rotate(180deg); }
        66% { transform: translate(-30px, -40px) rotate(360deg); }
    }
    
    @keyframes float-4 {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        33% { transform: translate(-30px, 50px) rotate(-180deg); }
        66% { transform: translate(40px, -20px) rotate(-360deg); }
    }
    
    @keyframes float-5 {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        33% { transform: translate(20px, -30px) rotate(90deg); }
        66% { transform: translate(-50px, 30px) rotate(270deg); }
    }
    
    @keyframes float-6 {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        33% { transform: translate(-20px, 40px) rotate(-90deg); }
        66% { transform: translate(30px, -50px) rotate(-270deg); }
    }
    
    @keyframes border-glow {
        0%, 100% { border-color: transparent; box-shadow: 0 0 20px rgba(181, 159, 132, 0.3); }
        50% { border-color: rgba(181, 159, 132, 0.1); box-shadow: 0 0 40px rgba(181, 159, 132, 0.6); }
    }
    
    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes text-glow {
        0%, 100% { text-shadow: 0 0 20px rgba(181, 159, 132, 0.5); }
        50% { text-shadow: 0 0 30px rgba(181, 159, 132, 0.8), 0 0 40px rgba(181, 159, 132, 0.6); }
    }
    
    @keyframes pulse-slow {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.8; }
    }
    
    @keyframes scroll {
        0% { transform: translateY(0); opacity: 1; }
        100% { transform: translateY(10px); opacity: 0; }
    }
    
    /* Animation Classes */
    .animate-gradient-x {
        background-size: 200% 200%;
        animation: gradient-x 8s ease infinite;
    }
    
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }
    
    .animate-float-1 { animation: float-1 20s ease-in-out infinite; }
    .animate-float-2 { animation: float-2 25s ease-in-out infinite; }
    .animate-float-3 { animation: float-3 30s ease-in-out infinite; }
    .animate-float-4 { animation: float-4 35s ease-in-out infinite; }
    .animate-float-5 { animation: float-5 40s ease-in-out infinite; }
    .animate-float-6 { animation: float-6 45s ease-in-out infinite; }
    
    .animate-border-glow {
        animation: border-glow 4s ease-in-out infinite;
    }
    
    .animate-fade-in-up {
        animation: fade-in-up 1s ease-out forwards;
    }
    
    .animate-text-glow {
        animation: text-glow 3s ease-in-out infinite;
    }
    
    .animate-pulse-slow {
        animation: pulse-slow 2s ease-in-out infinite;
    }
    
    .animate-scroll {
        animation: scroll 2s ease-in-out infinite;
    }
    
    /* Delay Utilities */
    .delay-200 { animation-delay: 200ms; }
    .delay-300 { animation-delay: 300ms; }
    .delay-400 { animation-delay: 400ms; }
    .delay-500 { animation-delay: 500ms; }
    .delay-700 { animation-delay: 700ms; }

    /* Additional Custom Animations */
    @keyframes shine {
        0% { transform: translateX(-100%) skewX(-12deg); }
        100% { transform: translateX(200%) skewX(-12deg); }
    }

    .animate-shine {
        animation: shine 3s ease-in-out infinite;
    }

    .text-shadow-lg {
        text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    /* Ensure all animations work together */
    .animate-fade-in-up {
        opacity: 0;
        transform: translateY(30px);
        animation: fade-in-up 0.8s ease-out forwards;
    }

    @keyframes fade-in-up {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Keep existing animations from previous code */
    .animate-float { animation: float 6s ease-in-out infinite; }
    .animate-float-1 { animation: float-1 15s ease-in-out infinite; }
    .animate-float-2 { animation: float-2 20s ease-in-out infinite; }
    .animate-float-3 { animation: float-3 25s ease-in-out infinite; }
    .animate-float-4 { animation: float-4 30s ease-in-out infinite; }
    .animate-float-5 { animation: float-5 35s ease-in-out infinite; }
    .animate-pulse-slow { animation: pulse-slow 3s ease-in-out infinite; }

    .delay-100 { animation-delay: 100ms; }
    .delay-200 { animation-delay: 200ms; }
    .delay-300 { animation-delay: 300ms; }
    .delay-400 { animation-delay: 400ms; }
    .delay-500 { animation-delay: 500ms; }
    .delay-600 { animation-delay: 600ms; }
    .delay-1000 { animation-delay: 1000ms; }
</style>
</x-app-layout>