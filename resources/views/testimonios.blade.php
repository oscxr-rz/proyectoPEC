<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testimonios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        
        .video-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .video-item {
            background: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .video-item:hover {
            transform: translateY(-5px);
        }
        
        .video-item video {
            width: 100%;
            height: auto;
            border-radius: 5px;
            background-color: #000;
        }
        
        .video-title {
            margin-top: 10px;
            font-weight: bold;
            color: #555;
            text-align: center;
            font-size: 14px;
        }
        
        .no-testimonios {
            text-align: center;
            color: #666;
            font-size: 18px;
            margin-top: 50px;
        }
        
        @media (max-width: 768px) {
            .video-container {
                grid-template-columns: 1fr;
            }
            
            body {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <h1>Testimonios</h1>
    
    @if (!empty($testimonios))
        <div class="video-container">
            @foreach($testimonios as $testimonio)
                <div class="video-item">
                    <video controls preload="metadata">
                        <source src="{{ asset('storage/' . $testimonio) }}" type="video/{{ pathinfo($testimonio, PATHINFO_EXTENSION) }}">
                        Tu navegador no soporta el elemento de video.
                    </video>
                    <div class="video-title">
                        {{ pathinfo($testimonio, PATHINFO_FILENAME) }}
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="no-testimonios">No hay testimonios disponibles.</p>
    @endif
</body>
</html>