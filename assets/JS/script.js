// ========================
// JavaScript: 画面遷移の制御
// ========================

// メニューの切り替え機能
function navigate(pageId) {
    // すべてのページを非表示にする
    const pages = document.querySelectorAll('.page');
    pages.forEach(page => page.classList.remove('active'));

    // 選択されたページを表示する
    document.getElementById(pageId).classList.add('active');

    // ナビゲーションのハイライトを更新
    const navLinks = document.querySelectorAll('nav a');
    navLinks.forEach(link => link.classList.remove('active'));
    
    // 店舗詳細ページの場合はナビゲーションのハイライトは「店舗一覧」のままにする
    const activeNavId = (pageId === 'shop-detail') ? 'nav-shops' : 'nav-' + pageId;
    const activeNav = document.getElementById(activeNavId);
    if(activeNav) {
        activeNav.classList.add('active');
    }
}

// 店舗詳細の表示機能
const shopData = {
    'tokyo': {
        name: '東京本店',
        address: '東京都新宿区1-1-1',
        hours: '11:00 - 22:00 (L.O. 21:30)',
        tel: '03-XXXX-XXXX'
    },
    'osaka': {
        name: '大阪店',
        address: '大阪府大阪市北区2-2-2',
        hours: '11:30 - 21:00 (L.O. 20:30)',
        tel: '06-XXXX-XXXX'
    }
};

function showShopDetail(shopId) {
    const data = shopData[shopId];
    const contentDiv = document.getElementById('detail-content');
    
    // 詳細ページの内容を動的に生成
    contentDiv.innerHTML = `
        <h3 style="font-size: 1.5em;">${data.name}</h3>
        <p><strong>住所:</strong> ${data.address}</p>
        <p><strong>営業時間:</strong> ${data.hours}</p>
        <p><strong>電話番号:</strong> ${data.tel}</p>
        <div style="background-color: #eee; height: 150px; display: flex; align-items: center; justify-content: center; color: #888; margin-top: 20px;">
            [ ${data.name}のGoogleマップが入ります ]
        </div>
    `;
    
    // 店舗詳細ページへ遷移
    navigate('shop-detail');
}