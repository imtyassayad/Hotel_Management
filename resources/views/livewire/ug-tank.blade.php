    <div class="tank">
        <div class="warning">
            <p style="color:red"> {{ $warning }}</p>
            <h5 style="color: #fff">{{ $water_level . ' Lit' }}</h5>
            <h5>{{ $title }}</h5>
        </div>
        <div class="water" style="height: {{ $water_level }}%"></div>
    </div>
