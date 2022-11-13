// window.jsPDF = window.jspdf.jsPDF;
// $('#gerar_pdf').click(function () {
//         let x = $(".declaracao_isencao").val();
//         console.log(x);
//         const doc = new jsPDF();
//         doc.setFont(undefined, 'bold').setFontSize(24).text("Termo de Associação AVICO", 100, 10, 'center',);
//         doc.setFont(undefined, 'normal').setFontSize(14).text(content_split(doc, "Os dados fornecidos serão utilizados exclusivamente pela nossa Associação, sendo vedado o uso para fins diversos, seguindo a Lei Geral Proteção de Dados LEI Nº 13.709, DE 14 DE AGOSTO DE 2018.", 180), 100, 30,'center');
//         doc.setFont(undefined, 'bold').setFontSize(14).text(content_split(doc, "Venho, através do preenchimento dos dados solicitados neste Termo de Associação, requerer a admissão como Associado da AVICO – Associação de Vítimas e Familiares de vítimas de COVID-19, inscrita no CNPJ sob nº 42.900.150/0001-00, com sede na Avenida Praia de Belas, nº 454, apto 201, Praia de Belas, CEP 90110-000, Porto Alegre/RS, de acordo com o artigo 27, parágrafo segundo, do Estatuto e suas alterações, disponível no site www.avico.com.br, do qual declaro, por meio deste termo, ter total conhecimento e me comprometo a respeitar todas as suas disposições.", 180), 100, 60,'center');
//         doc.setFont(undefined, 'bold').setFontSize(16).text("Dados Pessoais", 100, 110, 'center',);
//         doc.html(document.body, {
//            x: 100,
//            y: 160
//         });        
//         doc.save("termo_associacao.pdf");
//     });

// function content_split(doc, text, number_toSplit){
//     return doc.splitTextToSize( text, number_toSplit);
// }

    // $('#gerar_pdf').on('click',function(e){
    //     e.preventDefault();

    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });

    //     jQuery.ajax({
    //         type: 'post',
    //         data: $('#formulario').val(),
    //         url: "inscricao/gerar_pdf",
    //         success: function(result){
    //             console.log(result);
    //         }
    //     });
    // });