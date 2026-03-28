<!-- Advertisement Section -->
<section class="advertisement-section">
    <div class="container-fluid">
        <div class="row align-items-center">
            <!-- Left Content -->
            <div class="col-lg-7 col-md-12">
                <div class="advertisement-content">
                    <h2 class="advertisement-title">Siap Bekerja Sama dengan Kami?</h2>
                    <p class="advertisement-subtitle">Mari wujudkan solusi terbaik untuk kebutuhan Anda bersama tim kami.</p>
                </div>
            </div>
            
            <!-- Right Button -->
            <div class="col-lg-5 col-md-12 text-lg-end text-center">
                <a href="{{ route('contact') }}" class="btn-advertisement">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>

<style>
.advertisement-section {
    background: linear-gradient(135deg, #FE9800 0%, #FF8C00 100%);
    padding: 80px 0;
    position: relative;
    overflow: hidden;
    margin: 80px 0;
}

/* Abstract shapes background */
.advertisement-section::before {
    content: '';
    position: absolute;
    top: -50px;
    left: -50px;
    width: 200px;
    height: 200px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    z-index: 1;
}

.advertisement-section::after {
    content: '';
    position: absolute;
    bottom: -30px;
    right: -30px;
    width: 150px;
    height: 150px;
    background: rgba(0, 0, 0, 0.1);
    border-radius: 50%;
    z-index: 1;
}

.advertisement-content {
    position: relative;
    z-index: 2;
}

.advertisement-title {
    color: white;
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 20px;
    line-height: 1.2;
}

.advertisement-subtitle {
    color: rgba(255, 255, 255, 0.9);
    font-size: 1.1rem;
    line-height: 1.6;
    margin: 0;
}

.btn-advertisement {
    background: white;
    color: #333;
    padding: 15px 40px;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    position: relative;
    z-index: 2;
}

.btn-advertisement:hover {
    background: #f8f9fa;
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    color: #333;
    text-decoration: none;
}

/* Responsive Design */
@media (max-width: 768px) {
    .advertisement-section {
        padding: 60px 0;
        margin: 60px 0;
    }
    
    .advertisement-title {
        font-size: 2rem;
        text-align: center;
    }
    
    .advertisement-subtitle {
        font-size: 1rem;
        text-align: center;
        margin-bottom: 30px;
    }
    
    .btn-advertisement {
        padding: 12px 35px;
        font-size: 0.95rem;
    }
}

@media (max-width: 576px) {
    .advertisement-section {
        padding: 50px 0;
        margin: 50px 0;
    }
    
    .advertisement-title {
        font-size: 1.8rem;
    }
    
    .advertisement-subtitle {
        font-size: 0.95rem;
    }
    
    .btn-advertisement {
        padding: 10px 30px;
        font-size: 0.9rem;
    }
}
</style>
