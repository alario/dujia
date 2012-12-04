package data;

import org.apache.ibatis.annotations.Insert;

public class USRCaptcha {

	private String key;
	private String answer;

	/**
	 * @return the key
	 */
	public String getKey() {
		return key;
	}

	/**
	 * @param key
	 *            the key to set
	 */
	public void setKey(String key) {
		this.key = key;
	}

	/**
	 * @return the answer
	 */
	public String getAnswer() {
		return answer;
	}

	/**
	 * @param answer
	 *            the answer to set
	 */
	public void setAnswer(String answer) {
		this.answer = answer;
	}

	public interface Mapper {
		@Insert("insert into usr_captcha(uuid_key,answer) values(#{key},#{answer})")
		public void insert(USRCaptcha item);
	}
}
