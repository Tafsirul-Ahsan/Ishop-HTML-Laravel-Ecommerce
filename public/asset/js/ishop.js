(() => {
 const $=s=>document.querySelector(s);
 const menu=$('#accountMenu');
 $('#accountBtn')?.addEventListener('click',()=>menu.classList.toggle('active'));
 document.addEventListener('click',e=>{if(!e.target.closest('.dropdown-holder'))menu?.classList.remove('active')});
 let count=0;
 document.querySelectorAll('.add-cart').forEach(btn=>btn.addEventListener('click',()=>{count++;$('#cartCount').textContent=count;btn.textContent='Added';setTimeout(()=>btn.textContent='Add to cart',1000)}));
 $('#searchForm')?.addEventListener('submit',e=>{e.preventDefault();const q=$('#searchInput').value.trim().toLowerCase();let found=0;document.querySelectorAll('.product-tile').forEach(card=>{const ok=!q||card.innerText.toLowerCase().includes(q);card.hidden=!ok;if(ok)found++});document.querySelector('#featured')?.scrollIntoView({behavior:'smooth'});if(q&&!found)alert('No matching demo products. Connect the live product API to search the complete catalogue.')});
 $('#year').textContent=new Date().getFullYear();
})();