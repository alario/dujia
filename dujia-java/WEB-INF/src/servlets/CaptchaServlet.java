package servlets;

import java.awt.Color;
import java.awt.Font;
import java.awt.image.BufferedImage;
import java.io.IOException;
import java.io.InputStream;
import java.util.ArrayList;
import java.util.List;
import java.util.UUID;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.ibatis.io.Resources;
import org.apache.ibatis.session.SqlSession;
import org.apache.ibatis.session.SqlSessionFactory;
import org.apache.ibatis.session.SqlSessionFactoryBuilder;

import core.Database;

import data.USRCaptcha;

import apple.awt.CColor;

import nl.captcha.Captcha;
import nl.captcha.Captcha.Builder;
import nl.captcha.gimpy.StretchGimpyRenderer;
import nl.captcha.servlet.CaptchaServletUtil;
import nl.captcha.text.producer.DefaultTextProducer;
import nl.captcha.text.renderer.ColoredEdgesWordRenderer;
import nl.captcha.text.renderer.DefaultWordRenderer;

public class CaptchaServlet extends HttpServlet {

	/**
	 * 
	 */
	private static final long serialVersionUID = 140932425724477562L;

	/*
	 * (non-Javadoc)
	 * 
	 * @see
	 * javax.servlet.http.HttpServlet#doGet(javax.servlet.http.HttpServletRequest
	 * , javax.servlet.http.HttpServletResponse)
	 */
	@Override
	protected void doGet(HttpServletRequest req, HttpServletResponse resp)
			throws ServletException, IOException {
	

		List<Color> colors = new ArrayList<Color>();
		colors.add(CColor.DARK_GRAY);

		List<Font> fonts = new ArrayList<Font>();
		fonts.add(new Font("Monospaced", 0, 24));

		Builder builder = new Captcha.Builder(60, 30)
				.addText(
						new DefaultTextProducer(4,
								"1234567890ABCDEFGHJKLMNPQRSTUVWXY"
										.toCharArray()),
						new DefaultWordRenderer(colors, fonts)).gimp()
				.addBorder();

		Captcha captcha = builder.build();
		String answer = captcha.getAnswer();
		UUID uuid = UUID.randomUUID();
		String key = uuid.toString();
		
		String resource = "data/mybatis-config.xml";
		InputStream inputStream = Resources.getResourceAsStream(resource);
		SqlSessionFactory sqlSessionFactory = new SqlSessionFactoryBuilder()
				.build(inputStream);
		SqlSession session = Database.getInstance().openSession();
		USRCaptcha.Mapper mapper = session.getMapper(USRCaptcha.Mapper.class);
		USRCaptcha item = new USRCaptcha();
		item.setKey(key);
		item.setAnswer(answer);
		mapper.insert(item);
		session.commit();
		session.close();
		BufferedImage image = captcha.getImage();
		CaptchaServletUtil.writeImage(resp, image);

	}

}
