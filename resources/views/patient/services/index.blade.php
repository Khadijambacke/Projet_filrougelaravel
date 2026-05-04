@extends('layouts.dashpatient')

@section('contenu')

<style>
  .dash-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
    flex-wrap: wrap;
    gap: 10px;
  }

  .dash-title { font-size: 20px; font-weight: 700; color: #1a1a1a; margin: 0; }
  .dash-sub   { font-size: 12.5px; color: #888; margin: 3px 0 0; }

  .badge-count {
    background: #0D5C4A; color: #a8e6d4;
    font-size: 12px; font-weight: 500;
    padding: 5px 14px; border-radius: 20px;
    white-space: nowrap;
  }

  /* ── GRILLE 3 colonnes → 2 → 1 ── */
  .services-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
  }

  @media (max-width: 1100px) {
    .services-grid { grid-template-columns: repeat(2, 1fr); }
  }

  @media (max-width: 640px) {
    .services-grid { grid-template-columns: 1fr; }
  }

  /* ── CARD ── */
  .svc-card {
    background: #fff;
    border: 0.5px solid #e0e8e5;
    border-radius: 14px;
    overflow: hidden;
    transition: transform 0.2s, border-color 0.2s;
  }

  .svc-card:hover {
    transform: translateY(-3px);
    border-color: #b0c8bf;
  }

  .svc-accent { height: 3px; background: linear-gradient(90deg, #0D5C4A, #1cc88a); }
  .svc-body   { padding: 16px 16px 14px; }

  .svc-top {
    display: flex; align-items: center;
    justify-content: space-between; margin-bottom: 12px;
  }

  .svc-ico {
    width: 36px; height: 36px; border-radius: 9px;
    background: #e8f6f1; display: flex;
    align-items: center; justify-content: center; font-size: 17px;
  }

  .svc-dur {
    font-size: 11.5px; color: #0D5C4A; background: #e8f6f1;
    padding: 3px 10px; border-radius: 20px; font-weight: 500;
  }

  .svc-name { font-size: 14px; font-weight: 700; color: #1a1a1a; margin-bottom: 5px; }
  .svc-desc { font-size: 12px; color: #888; line-height: 1.6; margin-bottom: 12px; }

  .svc-doc {
    display: flex; align-items: center; gap: 9px;
    background: #f5faf8; padding: 8px 10px;
    border-radius: 10px; margin-bottom: 12px;
  }

  .doc-av {
    width: 28px; height: 28px; border-radius: 50%;
    background: linear-gradient(135deg, #0D5C4A, #1cc88a);
    display: flex; align-items: center; justify-content: center;
    font-size: 10px; font-weight: 700; color: #fff; flex-shrink: 0;
  }

  .doc-n { font-size: 12px; font-weight: 600; color: #1a1a1a; }
  .doc-r { font-size: 10.5px; color: #888; }

  .svc-foot {
    display: flex; align-items: center;
    justify-content: space-between;
    padding-top: 12px; border-top: 0.5px solid #f0f0f0;
  }

  .svc-px { font-size: 14px; font-weight: 700; color: #0D5C4A; }
  .svc-px small { font-size: 11px; font-weight: 400; color: #888; }

  .btns { display: flex; gap: 6px; }

  .btn-detail {
    font-size: 12px; padding: 6px 13px; border-radius: 20px;
    border: 0.5px solid #dde; background: transparent;
    color: #444; text-decoration: none; font-weight: 500;
    transition: background 0.15s;
  }
  .btn-detail:hover { background: #f5f5f5; color: #222; }

  .btn-book {
    font-size: 12px; padding: 6px 14px; border-radius: 20px;
    border: none; background: #0D5C4A; color: #d0f0e6;
    text-decoration: none; font-weight: 500;
    transition: background 0.15s;
  }
  .btn-book:hover { background: #13855c; color: #fff; }
</style>

<div class="dash-header">
  <div>
    <h1 class="dash-title">Nos services médicaux</h1>
    <p class="dash-sub">Choisissez un service et réservez votre consultation</p>
  </div>
  <span class="badge-count">{{ $services->count() }} disponibles</span>
</div>

<div class="services-grid">
  @forelse($services as $service)
    <div class="svc-card">
      <div class="svc-accent"></div>
      <div class="svc-body">

        <div class="svc-top">
          <div class="svc-ico">
            <i class="fas fa-stethoscope" style="color:#0D5C4A;font-size:15px;"></i>
          </div>
          <span class="svc-dur">
            <i class="fas fa-clock" style="font-size:10px;"></i> {{ $service->duree }} min
          </span>
        </div>

        <div class="svc-name">{{ $service->titre }}</div>
        <div class="svc-desc">{{ Str::limit($service->description, 90) }}</div>

        @if($service->medecin)
          <div class="svc-doc">
            <div class="doc-av">{{ strtoupper(substr($service->medecin->name, 0, 2)) }}</div>
            <div>
              <div class="doc-n">Dr. {{ $service->medecin->name }}</div>
              <div class="doc-r">Médecin assigné</div>
            </div>
          </div>
        @endif

        <div class="svc-foot">
          <div class="svc-px">
            {{ number_format($service->prix, 0, ',', ' ') }} <small>FCFA</small>
          </div>
          <div class="btns">
            <a href="{{ route('detailservice', $service->id) }}" class="btn-detail">Détails</a>
            @auth
              @if(auth()->user()->role === 'patient')
                <a href="{{ route('reserver', $service->id)}}" class="btn-book">Réserver</a>
              @endif
            @else
              <a href="{{ route('login') }}" class="btn-book">Réserver</a>
            @endauth
          </div>
        </div>

      </div>
    </div>
  @empty
    <p style="color:#888;font-size:14px;grid-column:1/-1;">Aucun service disponible.</p>
  @endforelse
</div>

@endsection