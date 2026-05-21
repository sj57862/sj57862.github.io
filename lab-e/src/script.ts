const msg: string = "Hello!"; 

alert(msg); 

const style1_href = '/public/style-1.css';
const style2_href = '/public/style-2.css';
const style3_href = '/public/style-3.css';

const style_link = document.createElement('link');
style_link.rel = 'stylesheet';
style_link.href = style1_href;
document.head.appendChild(style_link);

const switcher_style = document.createElement('style');
switcher_style.textContent = `
    .style-switcher {
        position: fixed;
        right: 16px;
        bottom: 16px;
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        max-width: calc(100vw - 32px);
        z-index: 100;
    }

    .style-switcher button {
        flex: 0 0 auto;
        padding: 8px 12px;
        border: 1px solid #333;
        border-radius: 6px;
        cursor: pointer;
    }
`;
document.head.appendChild(switcher_style);

function switch_style (key:number) {
    switch (key){
        case 1:
            style_link.href = style1_href;
            break;
        case 2:
            style_link.href = style2_href;
            break;
        case 3:
            style_link.href = style3_href;
            break;
        default:
            console.log('何もしているな');
            break;
    }
}

const change_style_cont = document.createElement('div');
change_style_cont.className = 'style-switcher';

const btn_style1 = document.createElement('button');
btn_style1.textContent = 'style-1';
btn_style1.addEventListener('click',()=>{
    switch_style(1);
});

const btn_style2 = document.createElement('button');
btn_style2.textContent = 'style-2';
btn_style2.addEventListener('click',()=>{
    switch_style(2);
});

const btn_style3 = document.createElement('button');
btn_style3.textContent = 'style-3';
btn_style3.addEventListener('click',()=>{
    switch_style(3);
});

const tab = [btn_style1,btn_style2,btn_style3];
for(const styl of tab){
    change_style_cont.appendChild(styl);
}

document.body.appendChild(change_style_cont);
