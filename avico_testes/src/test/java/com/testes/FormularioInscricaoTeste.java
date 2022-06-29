package com.testes;

import java.util.Random;

import org.junit.Before;
import org.junit.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.JavascriptExecutor;
import org.openqa.selenium.Keys;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.edge.EdgeDriver;
import org.openqa.selenium.interactions.Actions;

/**
 * Unit test for simple App.
 */
public class FormularioInscricaoTeste {
    private WebDriver driver;
    final String BTN_NEXT = "next";
    Actions action;

    @Before
    public void setUp() {
        System.setProperty("webdriver.edge.driver", "C:/selenium/driver/msedgedriver.exe ");
        driver = new EdgeDriver();
        action = new Actions(driver);
        driver.get("http://localhost:8000/inscricao");
        driver.manage().window().maximize();
    }

    public void generoRandom() {
        Random r = new Random();
        int nmrRandom = r.nextInt(3);
        if (nmrRandom == 0)
            driver.findElement(By.id("Masculino")).click();
        else if (nmrRandom == 1)
            driver.findElement(By.id("Feminino")).click();
        else if (nmrRandom == 2)
            driver.findElement(By.id("Neutro")).click();
    }

    public String condicaoRandom() {
        Random r = new Random();
        int nmrRandom = r.nextInt(3);
        if (nmrRandom == 0) {
            driver.findElement(By.id("sobrevivente")).click();
            return "s";
        } else if (nmrRandom == 1) {
            driver.findElement(By.id("familiar")).click();
            return "f";
        } else if (nmrRandom == 2) {
            driver.findElement(By.id("nenhum")).click();
            return "n";
        }
        return null;
    }

    public void pagamentoRandom() {
        Random r = new Random();
        int nmrRandom = r.nextInt(2);
        if (nmrRandom == 0)
            driver.findElement(By.id("deposito")).click();
        else if (nmrRandom == 1)
            driver.findElement(By.id("pix")).click();
    }

    @Test
    public void cadastroAssociado() {
        try {
            driver.findElement(By.id("associado")).click();
            driver.findElement(By.className(BTN_NEXT)).click();
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            driver.findElement(By.id("termos")).click();
            driver.findElement(By.className(BTN_NEXT)).click();
            action.sendKeys(Keys.PAGE_UP).build().perform();
            action.sendKeys(Keys.PAGE_UP).build().perform();
            Thread.sleep(2000);
            driver.findElement(By.name("nome")).sendKeys("Teste");
            driver.findElement(By.name("dataNascimento")).sendKeys("12/03/2002");
            generoRandom();
            driver.findElement(By.name("cpf")).sendKeys("102398128192");
            driver.findElement(By.name("rg")).sendKeys("12321312321523");
            driver.findElement(By.name("celular")).sendKeys("1293821031");
            driver.findElement(By.name("telefone_residencial")).sendKeys("102398128192");
            driver.findElement(By.name("email")).sendKeys("sla@gmail.com");
            driver.findElement(By.name("endereco")).sendKeys("102398128192");
            driver.findElement(By.name("nmrEndereco")).sendKeys("102398128192");
            driver.findElement(By.name("complemento")).sendKeys("102398128192");
            driver.findElement(By.name("cep")).sendKeys("102398128192");
            driver.findElement(By.name("bairro")).sendKeys("102398128192");
            driver.findElement(By.name("cidade_uf")).sendKeys("102398128192");
            driver.findElement(By.name("profissao")).sendKeys("qoskwokows");
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            String letra = condicaoRandom();
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            driver.findElement(By.className("password")).sendKeys("1234");
            driver.findElement(By.className(BTN_NEXT)).click();
            pagamentoRandom();
            driver.findElement(By.className(BTN_NEXT)).click();
            driver.findElement(By.name("cpf_rg[]")).sendKeys("C:/selenium/img/csnn.png");
            if (letra.equals("s")) {
                driver.findElement(By.name("comprovanteMedico[]")).sendKeys("C:/selenium/img/csnn.png");
            } else if (letra.equals("f")) {
                driver.findElement(By.name("certidaoObito[]")).sendKeys("C:/selenium/img/csnn2.png");
            }
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            driver.findElement(By.name("comprovanteEndereco[]")).sendKeys("C:/selenium/img/csnn2.png");
            driver.findElement(By.name("comprovanteRenda[]")).sendKeys("C:/selenium/img/csnn2.png");
          driver.findElement(By.xpath("/html/body/div/div/div/form/div[6]/button[3]")).click();
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }

    @Test
    public void cadastroAssociado2() {
        try {
            driver.findElement(By.id("associado")).click();
            driver.findElement(By.className(BTN_NEXT)).click();
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            driver.findElement(By.id("termos")).click();
            driver.findElement(By.className(BTN_NEXT)).click();
            action.sendKeys(Keys.PAGE_UP).build().perform();
            action.sendKeys(Keys.PAGE_UP).build().perform();
            Thread.sleep(2000);
            driver.findElement(By.name("nome")).sendKeys("007");
            driver.findElement(By.name("dataNascimento")).sendKeys("vinticincu du dé de milnovecentieoitentaesete");
            generoRandom();
            driver.findElement(By.name("cpf")).sendKeys("associadosqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh");
            driver.findElement(By.name("rg")).sendKeys("seleniumhqqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh");
            driver.findElement(By.name("celular")).sendKeys("cincocinconovenovesixqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh");
            driver.findElement(By.name("telefone_residencial")).sendKeys("adsdasdasdasfdsfgfgjtqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh");
            driver.findElement(By.name("email")).sendKeys("4578965454@4566456453687.com");
            driver.findElement(By.name("endereco")).sendKeys("vai a direita depois a esquerda e depois dobra e chegou qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhq");
            driver.findElement(By.name("nmrEndereco")).sendKeys("oito oitoqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh");
            driver.findElement(By.name("complemento")).sendKeys("depois da ponte depois dos trilhosqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh");
            driver.findElement(By.name("cep")).sendKeys("qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh");
            driver.findElement(By.name("bairro")).sendKeys("qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqw erfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234");
            driver.findElement(By.name("cidade_uf")).sendKeys("qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqw erfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234");
            driver.findElement(By.name("profissao")).sendKeys("qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqw erfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234");
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            String letra = condicaoRandom();
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            driver.findElement(By.className("password")).sendKeys("qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqw erfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234");
            driver.findElement(By.className(BTN_NEXT)).click();
            pagamentoRandom();
            driver.findElement(By.className(BTN_NEXT)).click();
            driver.findElement(By.name("cpf_rg[]")).sendKeys("C:/selenium/img/Crash Bandicoot - The Wrath of Cortex (USA) (v1.01).bin");
            if (letra.equals("s")) {
                driver.findElement(By.name("comprovanteMedico[]")).sendKeys("C:/selenium/img/Crash Bandicoot - The Wrath of Cortex (USA) (v1.01).bin");
            } else if (letra.equals("f")) {
                driver.findElement(By.name("certidaoObito[]")).sendKeys("C:/selenium/img/Crash Bandicoot - The Wrath of Cortex (USA) (v1.01).bin");
            }
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            driver.findElement(By.name("comprovanteEndereco[]")).sendKeys("C:/selenium/img/Crash Bandicoot - The Wrath of Cortex (USA) (v1.01).bin");
            driver.findElement(By.name("comprovanteRenda[]")).sendKeys("C:/selenium/img/Crash Bandicoot - The Wrath of Cortex (USA) (v1.01).bin");
          driver.findElement(By.xpath("/html/body/div/div/div/form/div[6]/button[3]")).click();
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }

    @Test
    public void cadastroAssociado3() {
        try {
            driver.findElement(By.id("associado")).click();
            driver.findElement(By.className(BTN_NEXT)).click();
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            driver.findElement(By.id("termos")).click();
            driver.findElement(By.className(BTN_NEXT)).click();
            action.sendKeys(Keys.PAGE_UP).build().perform();
            action.sendKeys(Keys.PAGE_UP).build().perform();
            Thread.sleep(2000);
            driver.findElement(By.name("nome")).sendKeys(" ");
            driver.findElement(By.name("dataNascimento")).sendKeys(" ");
            generoRandom();
            driver.findElement(By.name("cpf")).sendKeys(" ");
            driver.findElement(By.name("rg")).sendKeys(" ");
            driver.findElement(By.name("celular")).sendKeys(" ");
            driver.findElement(By.name("telefone_residencial")).sendKeys(" ");
            driver.findElement(By.name("email")).sendKeys(" @ .com");
            driver.findElement(By.name("endereco")).sendKeys(" ");
            driver.findElement(By.name("nmrEndereco")).sendKeys(" ");
            driver.findElement(By.name("complemento")).sendKeys(" ");
            driver.findElement(By.name("cep")).sendKeys(" ");
            driver.findElement(By.name("bairro")).sendKeys(" ");
            driver.findElement(By.name("cidade_uf")).sendKeys(" ");
            driver.findElement(By.name("profissao")).sendKeys(" ");
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            String letra = condicaoRandom();
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            driver.findElement(By.className("password")).sendKeys(" ");
            driver.findElement(By.className(BTN_NEXT)).click();
            pagamentoRandom();
            driver.findElement(By.className(BTN_NEXT)).click();
            driver.findElement(By.name("cpf_rg[]")).sendKeys("C:/selenium/img/Crash Bandicoot - The Wrath of Cortex (USA) (v1.01).bin");
            if (letra.equals("s")) {
                driver.findElement(By.name("comprovanteMedico[]")).sendKeys("C:/selenium/img/Crash Bandicoot - The Wrath of Cortex (USA) (v1.01).bin");
            } else if (letra.equals("f")) {
                driver.findElement(By.name("certidaoObito[]")).sendKeys("C:/selenium/img/Crash Bandicoot - The Wrath of Cortex (USA) (v1.01).bin");
            }
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            driver.findElement(By.name("comprovanteEndereco[]")).sendKeys("C:/selenium/img/Crash Bandicoot - The Wrath of Cortex (USA) (v1.01).bin");
            driver.findElement(By.name("comprovanteRenda[]")).sendKeys("C:/selenium/img/Crash Bandicoot - The Wrath of Cortex (USA) (v1.01).bin");
          driver.findElement(By.xpath("/html/body/div/div/div/form/div[6]/button[3]")).click();
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }

    @Test
    public void cadastroVoluntario() {
        try {
            driver.findElement(By.id("voluntario")).click();
            driver.findElement(By.className(BTN_NEXT)).click();
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            driver.findElement(By.id("termos")).click();
            driver.findElement(By.className(BTN_NEXT)).click();
            action.sendKeys(Keys.PAGE_UP).build().perform();
            action.sendKeys(Keys.PAGE_UP).build().perform();
            Thread.sleep(2000);
            driver.findElement(By.name("nome")).sendKeys("Teste");
            driver.findElement(By.name("dataNascimento")).sendKeys("12/03/2002");
            generoRandom();
            driver.findElement(By.name("cpf")).sendKeys("102398128192");
            driver.findElement(By.name("rg")).sendKeys("12321312321523");
            driver.findElement(By.name("celular")).sendKeys("1293821031");
            driver.findElement(By.name("telefone_residencial")).sendKeys("102398128192");
            driver.findElement(By.name("email")).sendKeys("sla@gmail.com");
            driver.findElement(By.name("endereco")).sendKeys("102398128192");
            driver.findElement(By.name("nmrEndereco")).sendKeys("102398128192");
            driver.findElement(By.name("complemento")).sendKeys("102398128192");
            driver.findElement(By.name("cep")).sendKeys("102398128192");
            driver.findElement(By.name("bairro")).sendKeys("102398128192");
            driver.findElement(By.name("cidade_uf")).sendKeys("102398128192");
            driver.findElement(By.name("profissao")).sendKeys("qoskwokows");
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            String letra = condicaoRandom();
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            driver.findElement(By.className("password")).sendKeys("1234");
            driver.findElement(By.className(BTN_NEXT)).click();
            driver.findElement(By.name("cpf_rg[]")).sendKeys("C:/selenium/img/csnn.png");
            if (letra.equals("s")) {
                driver.findElement(By.name("comprovanteMedico[]")).sendKeys("C:/selenium/img/csnn.png");
            } else if (letra.equals("f")) {
                driver.findElement(By.name("certidaoObito[]")).sendKeys("C:/selenium/img/csnn2.png");
            }
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            driver.findElement(By.name("comprovanteEndereco[]")).sendKeys("C:/selenium/img/csnn2.png");
            driver.findElement(By.name("comprovanteRenda[]")).sendKeys("C:/selenium/img/csnn2.png");
          driver.findElement(By.xpath("/html/body/div/div/div/form/div[6]/button[3]")).click();
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }

    @Test
    public void cadastroVoluntario2() {
        try {
            driver.findElement(By.id("voluntario")).click();
            driver.findElement(By.className(BTN_NEXT)).click();
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            driver.findElement(By.id("termos")).click();
            driver.findElement(By.className(BTN_NEXT)).click();
            action.sendKeys(Keys.PAGE_UP).build().perform();
            action.sendKeys(Keys.PAGE_UP).build().perform();
            Thread.sleep(2000);
            driver.findElement(By.name("nome")).sendKeys("qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqw");
            driver.findElement(By.name("dataNascimento")).sendKeys("vinticincu du dé de milnovecentieoitentaesete");
            generoRandom();
            driver.findElement(By.name("cpf")).sendKeys("associadosqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh");
            driver.findElement(By.name("rg")).sendKeys("seleniumhqqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh");
            driver.findElement(By.name("celular")).sendKeys("cincocinconovenovesixqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh");
            driver.findElement(By.name("telefone_residencial")).sendKeys("adsdasdasdasfdsfgfgjtqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh");
            driver.findElement(By.name("email")).sendKeys("4578965454@4566456453687.commmmm");
            driver.findElement(By.name("endereco")).sendKeys("vai a direita depois a esquerda e depois dobra e chegou qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhq");
            driver.findElement(By.name("nmrEndereco")).sendKeys("oito oitoqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh");
            driver.findElement(By.name("complemento")).sendKeys("depois da ponte depois dos trilhosqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh");
            driver.findElement(By.name("cep")).sendKeys("qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh");
            driver.findElement(By.name("bairro")).sendKeys("qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqw erfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234");
            driver.findElement(By.name("cidade_uf")).sendKeys("qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqw erfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234");
            driver.findElement(By.name("profissao")).sendKeys("qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqw erfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234");
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            String letra = condicaoRandom();
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            driver.findElement(By.className("password")).sendKeys("qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234qwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqw erfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfhqwerfgdsfghryutyuifgfh1234");
            driver.findElement(By.className(BTN_NEXT)).click();
            pagamentoRandom();
            driver.findElement(By.className(BTN_NEXT)).click();
            driver.findElement(By.name("cpf_rg[]")).sendKeys("C:/selenium/img/Crash Bandicoot - The Wrath of Cortex (USA) (v1.01).bin");
            if (letra.equals("s")) {
                driver.findElement(By.name("comprovanteMedico[]")).sendKeys("C:/selenium/img/Crash Bandicoot - The Wrath of Cortex (USA) (v1.01).bin");
            } else if (letra.equals("f")) {
                driver.findElement(By.name("certidaoObito[]")).sendKeys("C:/selenium/img/Crash Bandicoot - The Wrath of Cortex (USA) (v1.01).bin");
            }
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            driver.findElement(By.name("comprovanteEndereco[]")).sendKeys("C:/selenium/img/Crash Bandicoot - The Wrath of Cortex (USA) (v1.01).bin");
            driver.findElement(By.name("comprovanteRenda[]")).sendKeys("C:/selenium/img/Crash Bandicoot - The Wrath of Cortex (USA) (v1.01).bin");
          driver.findElement(By.xpath("/html/body/div/div/div/form/div[6]/button[3]")).click();
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }
    @Test
    public void cadastroVoluntario3() {
        try {
            driver.findElement(By.id("voluntario")).click();
            driver.findElement(By.className(BTN_NEXT)).click();
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            driver.findElement(By.id("termos")).click();
            driver.findElement(By.className(BTN_NEXT)).click();
            action.sendKeys(Keys.PAGE_UP).build().perform();
            action.sendKeys(Keys.PAGE_UP).build().perform();
            Thread.sleep(2000);
            driver.findElement(By.name("nome")).sendKeys(" ");
            driver.findElement(By.name("dataNascimento")).sendKeys(" ");
            generoRandom();
            driver.findElement(By.name("cpf")).sendKeys(" ");
            driver.findElement(By.name("rg")).sendKeys(" ");
            driver.findElement(By.name("celular")).sendKeys(" ");
            driver.findElement(By.name("telefone_residencial")).sendKeys(" ");
            driver.findElement(By.name("email")).sendKeys(" @ .com");
            driver.findElement(By.name("endereco")).sendKeys(" ");
            driver.findElement(By.name("nmrEndereco")).sendKeys(" ");
            driver.findElement(By.name("complemento")).sendKeys(" ");
            driver.findElement(By.name("cep")).sendKeys(" ");
            driver.findElement(By.name("bairro")).sendKeys(" ");
            driver.findElement(By.name("cidade_uf")).sendKeys(" ");
            driver.findElement(By.name("profissao")).sendKeys(" ");
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            String letra = condicaoRandom();
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            driver.findElement(By.className("password")).sendKeys(" ");
            driver.findElement(By.className(BTN_NEXT)).click();
            pagamentoRandom();
            driver.findElement(By.className(BTN_NEXT)).click();
            driver.findElement(By.name("cpf_rg[]")).sendKeys("C:/selenium/img/Crash Bandicoot - The Wrath of Cortex (USA) (v1.01).bin");
            if (letra.equals("s")) {
                driver.findElement(By.name("comprovanteMedico[]")).sendKeys("C:/selenium/img/Crash Bandicoot - The Wrath of Cortex (USA) (v1.01).bin");
            } else if (letra.equals("f")) {
                driver.findElement(By.name("certidaoObito[]")).sendKeys("C:/selenium/img/Crash Bandicoot - The Wrath of Cortex (USA) (v1.01).bin");
            }
            action.sendKeys(Keys.PAGE_DOWN).build().perform();
            Thread.sleep(1000);
            driver.findElement(By.name("comprovanteEndereco[]")).sendKeys("C:/selenium/img/Crash Bandicoot - The Wrath of Cortex (USA) (v1.01).bin");
            driver.findElement(By.name("comprovanteRenda[]")).sendKeys("C:/selenium/img/Crash Bandicoot - The Wrath of Cortex (USA) (v1.01).bin");
          driver.findElement(By.xpath("/html/body/div/div/div/form/div[6]/button[3]")).click();
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }

}