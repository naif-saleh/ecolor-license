<div style="max-width: 800px; margin: 0 auto; padding: 20px; font-family: 'DejaVu Sans', sans-serif;">
    <h2 style="font-size: 24px; font-weight: 600; margin-bottom: 20px;">License Information</h2>
    
    @foreach ($infoItems as $label => $value)
        <div style="display: flex; justify-content: space-between; padding-bottom: 10px; margin-bottom: 10px; border-bottom: 1px solid #e2e8f0;">
            <span style="font-weight: 500; color: #64748b; width: 200px;">{{ $label }}</span>
            <span style="color: #334155;">{{ $value }}</span>
        </div>
    @endforeach
</div>