@extends('partials.dashboard')

@section('title', 'Dashboard')

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-blue-900 to-purple-900 relative overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-0 left-0 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
        <div class="absolute top-0 right-0 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
        <div class="absolute bottom-0 left-0 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="bg-white/10 backdrop-blur-md rounded-3xl p-6 border border-white/20 shadow-2xl">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-4xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">
                            Dashboard Sistem Pengaduan
                        </h1>
                        <p class="text-blue-100 mt-2 text-lg">Monitoring dan Manajemen Pengaduan Masyarakat</p>
                    </div>
                    <div class="hidden md:flex items-center space-x-4">
                        <div class="bg-gradient-to-r from-blue-600 to-purple-600 p-4 rounded-2xl shadow-lg transform hover:scale-110 transition-all duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modern Stat Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            @php
                $stats = [
                    ['title' => 'Total Pengaduan', 'count' => $totalPengaduan, 'color' => 'from-blue-500 to-cyan-600', 'icon' => 'chat-alt', 'bg' => 'bg-blue-500/20'],
                    ['title' => 'Sedang Diproses', 'count' => $diprosesPengaduan, 'color' => 'from-yellow-500 to-orange-600', 'icon' => 'refresh', 'bg' => 'bg-yellow-500/20'],
                    ['title' => 'Telah Diselesaikan', 'count' => $selesaiPengaduan, 'color' => 'from-green-500 to-emerald-600', 'icon' => 'check-circle', 'bg' => 'bg-green-500/20'],
                    ['title' => 'Petugas Aktif', 'count' => $petugasAktif, 'color' => 'from-purple-500 to-pink-600', 'icon' => 'user-group', 'bg' => 'bg-purple-500/20']
                ];
            @endphp

            @foreach ($stats as $index => $stat)
            <div class="group relative bg-white/10 backdrop-blur-md rounded-3xl p-6 border border-white/20 shadow-2xl hover:shadow-3xl transform hover:-translate-y-2 transition-all duration-500 hover:bg-white/20">
                <!-- Glow Effect -->
                <div class="absolute inset-0 bg-gradient-to-r {{ $stat['color'] }} opacity-0 group-hover:opacity-20 rounded-3xl transition-opacity duration-500"></div>
                
                <div class="relative z-10 flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-blue-100 text-sm font-medium mb-2">{{ $stat['title'] }}</p>
                        <h3 class="text-4xl font-bold text-white mb-3 counter-animation">{{ $stat['count'] }}</h3>
                        <div class="flex items-center text-green-300 text-sm">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                            <span>+{{ rand(5, 25) }}% bulan ini</span>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r {{ $stat['color'] }} rounded-2xl blur opacity-50 group-hover:opacity-75 transition-opacity duration-500"></div>
                        <div class="relative {{ $stat['bg'] }} backdrop-blur-sm p-4 rounded-2xl border border-white/30">
                            @if($stat['icon'] == 'chat-alt')
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                </svg>
                            @elseif($stat['icon'] == 'refresh')
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582M20 20v-5h-.581M5.582 9A7.5 7.5 0 0112 4.5h0a7.5 7.5 0 016.418 4.5M18.418 15A7.5 7.5 0 0112 19.5h0a7.5 7.5 0 01-6.418-4.5"/>
                                </svg>
                            @elseif($stat['icon'] == 'check-circle')
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4-4m6 2a9 9 0 11-18 0a9 9 0 0118 0z"/>
                                </svg>
                            @elseif($stat['icon'] == 'user-group')
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m0-4a4 4 0 110-8a4 4 0 010 8z"/>
                                </svg>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Main Content Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Pengaduan Terbaru --}}
            <div class="lg:col-span-2">
                <div class="bg-white/10 backdrop-blur-md rounded-3xl border border-white/20 shadow-2xl overflow-hidden">
                    <!-- Header -->
                    <div class="px-8 py-6 border-b border-white/10 bg-gradient-to-r from-blue-600/20 to-purple-600/20">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-3">
                                <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-2 rounded-xl">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-white">Pengaduan Terbaru</h3>
                            </div>
                            <a href="{{ route('pengaduan_admin.index') }}" 
                               class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-3 rounded-2xl text-sm font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                                <span class="flex items-center space-x-2">
                                    <span>Lihat Semua</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="max-h-96 overflow-y-auto custom-scrollbar">
                        @forelse($pengaduanTerbaru as $p)
                        <div class="px-8 py-6 hover:bg-white/5 transition-all duration-300 border-b border-white/5 group">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 relative">
                                    @if($p->foto)
                                        <img src="{{ asset('storage/' . $p->foto) }}" 
                                             class="h-14 w-14 rounded-2xl object-cover border-2 border-white/20 shadow-lg group-hover:scale-110 transition-transform duration-300" 
                                             alt="Foto">
                                    @else
                                        <div class="h-14 w-14 flex items-center justify-center rounded-2xl bg-gradient-to-r from-indigo-500 to-purple-600 border-2 border-white/20 shadow-lg group-hover:scale-110 transition-transform duration-300">
                                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                            </svg>
                                        </div>
                                    @endif
                                    <!-- Status Indicator -->
                                    <div class="absolute -top-1 -right-1 w-4 h-4 
                                        {{ $p->status == 'proses' ? 'bg-yellow-500' : ($p->status == 'selesai' ? 'bg-green-500' : 'bg-red-500') }} 
                                        rounded-full border-2 border-white/50 animate-pulse"></div>
                                </div>

                                <div class="flex-1 min-w-0">
                                    <div class="flex justify-between items-start mb-2">
                                        <h4 class="text-xl font-bold text-white group-hover:text-blue-300 transition-colors duration-300 truncate">
                                            {{ $p->judul }}
                                        </h4>
                                        <span class="text-blue-200 text-sm font-medium ml-4 whitespace-nowrap">
                                            {{ $p->created_at->diffForHumans() }}
                                        </span>
                                    </div>

                                    <p class="text-gray-300 text-base mb-4 line-clamp-2 leading-relaxed">
                                        {{ $p->isi_laporan }}
                                    </p>

                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-4">
                                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold border
                                                {{ $p->status == 'proses' ? 'bg-yellow-500/20 text-yellow-300 border-yellow-500/30' : 
                                                   ($p->status == 'selesai' ? 'bg-green-500/20 text-green-300 border-green-500/30' : 
                                                    'bg-red-500/20 text-red-300 border-red-500/30') }}">
                                                <div class="w-2 h-2 rounded-full mr-2 
                                                    {{ $p->status == 'proses' ? 'bg-yellow-400' : ($p->status == 'selesai' ? 'bg-green-400' : 'bg-red-400') }}">
                                                </div>
                                                {{ ucfirst($p->status) }}
                                            </span>
                                            <div class="flex items-center text-blue-200 text-sm">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                </svg>
                                                {{ $p->user->name }}
                                            </div>
                                        </div>
                                        
                                        <button class="bg-white/10 hover:bg-white/20 text-white p-2 rounded-xl transition-all duration-300 transform hover:scale-110">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="px-8 py-12 text-center">
                            <div class="bg-gradient-to-r from-gray-500 to-gray-600 p-4 rounded-2xl w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                </svg>
                            </div>
                            <p class="text-gray-300 text-lg">Belum ada pengaduan terbaru</p>
                            <p class="text-gray-400 text-sm mt-1">Pengaduan akan muncul disini ketika ada laporan baru</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- Aktivitas Terkini --}}
            <div>
                <div class="bg-white/10 backdrop-blur-md rounded-3xl border border-white/20 shadow-2xl overflow-hidden">
                    <!-- Header -->
                    <div class="px-6 py-6 border-b border-white/10 bg-gradient-to-r from-green-600/20 to-teal-600/20">
                        <div class="flex items-center space-x-3">
                            <div class="bg-gradient-to-r from-green-500 to-teal-600 p-2 rounded-xl">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white">Aktivitas Terkini</h3>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="max-h-96 overflow-y-auto custom-scrollbar">
                        @forelse($aktivitasTerbaru as $a)
                        <div class="px-6 py-4 hover:bg-white/5 transition-all duration-300 border-b border-white/5 group">
                            <div class="flex items-start space-x-4">
                                <div class="relative flex-shrink-0">
                                    <img class="h-12 w-12 rounded-2xl border-2 border-white/20 shadow-lg group-hover:scale-110 transition-transform duration-300" 
                                         src="https://ui-avatars.com/api/?name={{ urlencode($a->user->name) }}&background=random&color=fff&size=48&font-size=0.6" 
                                         alt="User">
                                    <!-- Online Indicator -->
                                    <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white/50 animate-pulse"></div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-white font-semibold text-base mb-1">{{ $a->user->name }}</p>
                                    <p class="text-gray-300 text-sm mb-2">
                                        Menanggapi pengaduan: 
                                        <span class="font-semibold text-blue-300 hover:text-blue-200 transition-colors cursor-pointer">
                                            {{ Str::limit($a->pengaduan->judul, 25) }}
                                        </span>
                                    </p>
                                    <div class="flex items-center justify-between">
                                        <p class="text-blue-200 text-xs">{{ $a->created_at->diffForHumans() }}</p>
                                        <div class="flex items-center space-x-1">
                                            <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse"></div>
                                            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                            <div class="w-2 h-2 bg-purple-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="px-6 py-12 text-center">
                            <div class="bg-gradient-to-r from-gray-500 to-gray-600 p-4 rounded-2xl w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <p class="text-gray-300 text-lg">Belum ada aktivitas</p>
                            <p class="text-gray-400 text-sm mt-1">Aktivitas terbaru akan muncul disini</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Custom Animations */
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.animation-delay-2000 {
    animation-delay: 2s;
}

.animation-delay-4000 {
    animation-delay: 4s;
}

/* Custom Scrollbar */
.custom-scrollbar::-webkit-scrollbar {
    width: 6px;
}

.custom-scrollbar::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background: linear-gradient(180deg, #667eea, #764ba2);
    border-radius: 10px;
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(180deg, #5a6fd8, #6a4190);
}

/* Line Clamp */
.line-clamp-1 {
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
}

.line-clamp-2 {
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

/* Hover Effects */
.hover-scale:hover {
    transform: scale(1.05);
}

/* Glass Effect Enhancement */
.backdrop-blur-md {
    backdrop-filter: blur(12px);
}

/* Counter Animation */
.counter-animation {
    animation: countUp 2s ease-out;
}

@keyframes countUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Additional Hover Effects */
.group:hover .group-hover\:scale-110 {
    transform: scale(1.1);
}

.group:hover .group-hover\:text-blue-300 {
    color: #93c5fd;
}

/* Gradient Text */
.text-gradient {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Button Hover Effects */
.btn-modern {
    position: relative;
    overflow: hidden;
}

.btn-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.btn-modern:hover::before {
    left: 100%;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animate counters on load
    const counters = document.querySelectorAll('.counter-animation');
    counters.forEach(counter => {
        const target = parseInt(counter.textContent.replace(/,/g, ''));
        if (!isNaN(target)) {
            animateCounter(counter, target);
        }
    });

    // Add ripple effect to cards
    const cards = document.querySelectorAll('.group');
    cards.forEach(card => {
        card.addEventListener('click', function(e) {
            const ripple = document.createElement('div');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.cssText = `
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.3);
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                transform: scale(0);
                animation: ripple 0.6s linear;
                pointer-events: none;
                z-index: 1000;
            `;
            
            this.style.position = 'relative';
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
});

function animateCounter(element, target) {
    let current = 0;
    const increment = target / 50;
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        element.textContent = Math.floor(current).toLocaleString();
    }, 40);
}

// Add CSS for ripple animation
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);
</script>
@endsection